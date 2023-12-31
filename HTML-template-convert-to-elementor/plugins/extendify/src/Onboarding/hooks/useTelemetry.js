import { useEffect, useState } from '@wordpress/element'
import { useGlobalStore } from '@onboarding/state/Global'
import { usePagesStore } from '@onboarding/state/Pages'
import { useUserSelectionStore } from '@onboarding/state/UserSelections'

export const useTelemetry = () => {
    const {
        goals: selectedGoals,
        pages: selectedPages,
        plugins: selectedPlugins,
        siteType: selectedSiteType,
        style: selectedStyle,
        siteTypeSearch,
    } = useUserSelectionStore()
    const { generating } = useGlobalStore()
    const { pages, currentPageIndex } = usePagesStore()
    const [url, setUrl] = useState()
    const [stepProgress, setStepProgress] = useState([])
    const [viewedStyles, setViewedStyles] = useState(new Set())

    useEffect(() => {
        const p = [...pages].map((p) => p[0])
        // Add pages as they move around
        setStepProgress((progress) =>
            progress?.at(-1) === p[currentPageIndex]
                ? progress
                : [...progress, p[currentPageIndex]],
        )
    }, [currentPageIndex, pages])

    useEffect(() => {
        if (!generating) return
        // They pressed Launch
        setStepProgress((progress) => [...progress, 'launched'])
    }, [generating])

    useEffect(() => {
        if (!Object.keys(selectedStyle ?? {})?.length) return
        // Add selectedStyle to the set
        setViewedStyles((styles) => {
            const newStyles = new Set(styles)
            newStyles.add(selectedStyle)
            return newStyles
        })
    }, [selectedStyle])

    useEffect(() => {
        let mode = 'onboarding'
        const search = window.location?.search
        mode = search?.indexOf('DEVMODE') > -1 ? 'onboarding-dev' : mode
        mode = search?.indexOf('LOCALMODE') > -1 ? 'onboarding-local' : mode
        setUrl(window?.extOnbData?.config?.api[mode])
    }, [])

    useEffect(() => {
        if (!url) return
        let id = 0
        let innerId = 0
        id = window.setTimeout(() => {
            const controller = new AbortController()
            innerId = window.setTimeout(() => {
                controller.abort()
            }, 500)
            fetch(`${url}/progress`, {
                method: 'POST',
                headers: {
                    'Content-type': 'application/json',
                    Accept: 'application/json',
                },
                signal: controller.signal,
                body: JSON.stringify({
                    selectedGoals: selectedGoals?.map((g) => g.id),
                    selectedGoalsSlugs: selectedGoals?.map((g) => g.slug),
                    selectedPages: selectedPages?.map((p) => p.id),
                    selectedPagesSlugs: selectedPages?.map((p) => p.slug),
                    selectedPlugins: selectedPlugins?.map((p) => p.name),
                    selectedSiteType: selectedSiteType?.slug
                        ? [selectedSiteType.slug]
                        : [],
                    selectedSiteTypeSlug: selectedSiteType?.slug,
                    selectedStyle: selectedStyle?.recordId
                        ? [selectedStyle.recordId]
                        : [],
                    selectedStyleSlug: selectedStyle?.slug,
                    stepProgress,
                    viewedStyles: [...viewedStyles]
                        .map((s) => s.recordId)
                        .slice(1),
                    viewedStylesSlugs: [...viewedStyles]
                        .map((s) => s.slug)
                        .slice(1),
                    siteTypeSearch,
                    insightsId: window.extOnbData?.siteId,
                    activeTests: JSON.stringify(window.extOnbData?.activeTests),
                    partnerName: window.extOnbData?.partnerName,
                    wpLanguage: window.extOnbData?.wpLanguage,
                    siteCreatedAt: window.extOnbData?.siteCreatedAt,
                }),
            }).catch(() => undefined)
        }, 1000)
        return () => [id, innerId].forEach((i) => window.clearTimeout(i))
    }, [
        url,
        selectedGoals,
        selectedPages,
        selectedPlugins,
        selectedSiteType,
        selectedStyle,
        pages,
        stepProgress,
        viewedStyles,
        siteTypeSearch,
    ])
}
