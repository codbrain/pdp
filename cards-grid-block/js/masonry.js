(function () {
    var GAP = 20;
    var BREAKPOINT = 891;

    function applyMasonry() {
        var grids = document.querySelectorAll('.cards-grid-block-container');

        grids.forEach(function (grid) {
            var items = grid.querySelectorAll('.card-item');

            items.forEach(function (item) {
                item.style.gridRowEnd = '';
            });

            if (window.innerWidth < BREAKPOINT) {
                return;
            }

            items.forEach(function (item) {
                var height = item.getBoundingClientRect().height;
                item.style.gridRowEnd = 'span ' + (Math.ceil(height) + GAP);
            });
        });
    }

    document.addEventListener('DOMContentLoaded', applyMasonry);
    window.addEventListener('resize', applyMasonry);
}());
