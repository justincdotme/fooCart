@extends('public.layouts.main')

@section('title')
    @parent {{ $title or 'Products' }}
@stop

@section('content')
    <div class="container">
        <div class="row row-top-buffer">
            <div class="col-sm-12">
                <h1>Shop Online</h1>
                <div class="panel panel-default">
                    <div class="panel-body">
                        <nav>
                            <div class="row">
                                <div class="col-sm-4 filter-left">
                                    <div class="dropdown inline">
                                        <button class="btn btn-default dropdown-toggle btn-cat-filter" type="button" id="filter-category" data-toggle="dropdown" aria-expanded="true">
                                            <span class="filter-category-label">Category (All)</span>
                                            <span class="caret"></span>
                                        </button>
                                        <ul id="categoryFilter" class="dropdown-menu" role="menu" aria-labelledby="filter-category">
                                            <li role="presentation"><a role="menuitem" tabindex="-1">Category (All)</a></li>
                                        </ul>
                                    </div>
                                    <div class="dropdown inline">
                                        <button class="btn btn-default dropdown-toggle btn-man-filter" type="button" id="filter-manufacturer" data-toggle="dropdown" aria-expanded="true">
                                            <span class="filter-manufacturer-label">Manufacturer (All)</span>
                                            <span class="caret"></span>
                                        </button>
                                        <ul id="manufacturerFilter" class="dropdown-menu" role="menu" aria-labelledby="filter-manufacturer">
                                            <li role="presentation"><a role="menuitem" tabindex="-1">Manufacturer (All)</a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="col-sm-4 filter-center">
                                    <ul class="shop-pagination pagination pagination-md">
                                        <li>
                                            <a class="prev" aria-label="Previous" href="#">
                                                <span aria-hidden="true">«</span>
                                            </a>
                                        </li>
                                        <li class="pag-last">
                                            <a class="next" aria-label="Next" href="#">
                                                <span aria-hidden="true">»</span>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                                <div class="col-sm-4">
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <div class="dropdown  filter-right ">Results:
                                                <button class="btn btn-default dropdown-toggle btn-prod-count" type="button" id="sort-by" data-toggle="dropdown" aria-expanded="true">
                                                    <span class="results-count-dropdown">10</span>
                                                    <span class="caret"></span>
                                                </button>
                                                <ul class="dropdown-menu filter-menu-right ul-prod-count" role="menu" aria-labelledby="sort-by">
                                                    <li role="presentation"><a role="menuitem" tabindex="-1" href="#">10</a></li>
                                                    <li role="presentation"><a role="menuitem" tabindex="-1" href="#">25</a></li>
                                                    <li role="presentation"><a role="menuitem" tabindex="-1" href="#">50</a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
        <div class="row" id="product-content">

        </div>
        <div class="row">
            <div class="col-sm-12 text-center">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <nav>
                            <ul class="shop-pagination pagination pagination-md">
                                <li>
                                    <a class="prev" aria-label="Previous" href="#">
                                        <span aria-hidden="true">«</span>
                                    </a>
                                </li>
                                <li class="pag-last">
                                    <a class="next" aria-label="Next" href="#">
                                        <span aria-hidden="true">»</span>
                                    </a>
                                </li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
@section('footer')
    @include('public.partials.product-template')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/handlebars.js/3.0.1/handlebars.min.js"></script>
    <script>
        var productList = window.productList || {};

        //Pagination
        productList.pagination = window.productList.pagination || {};
        //Create pages array
        productList.pagination.pages = new Array();
        //Set product per page default at 10
        productList.pagination.prodPerPage = 10;
        //Set the current page
        productList.pagination.currentPage = 1;

        /**
         * Apply the product-per page filter.
         * Re-render the page.
         */
        productList.pagination.setProdPerPage = function()
        {
            $('ul.ul-prod-count li a').click(function()
            {
                var count = $(this).text();
                if(count != productList.pagination.prodPerPage)
                {
                    productList.pagination.currentPage = 1;
                    productList.pagination.prodPerPage = count;
                    productList.pagination.setPages();
                    $('button.btn-prod-count').find('span.results-count-dropdown').text(count);
                    productList.pagination.getPageCount();
                    productList.pagination.setPageLinks();
                    productList.renderPage();
                    productList.pagination.pageByNumber();
                }
            });
        };

        /**
         * Handle pagination.
         */
        productList.pagination.pageByNumber = function()
        {
            $('ul.shop-pagination li').each(function()
            {
                $(this).on('click', 'a', function()
                {
                    var page = $(this).text();
                    var parent = $(this).parent('li');
                    if(!parent.hasClass("active") && !isNaN(page))
                    {
                        productList.pagination.currentPage = page;
                        productList.renderPage();
                        productList.pagination.setActivePage();
                    }
                });
            });
        };

        /**
         * Highlight the page link for the active page
         */
        productList.pagination.setActivePage = function()
        {
            $('ul.shop-pagination li').each(function()
            {
                if($(this).find('a').text() == productList.pagination.currentPage)
                {
                    $(this).addClass("active");
                }else{
                    $(this).removeClass("active");
                }
            });
        };

        /**
         * Handle forward (next) pagination navigation
         */
        productList.pagination.pageForward = function()
        {
            if(productList.pagination.pageCount > productList.pagination.currentPage)
            {
                productList.pagination.currentPage++;
                productList.renderPage();
                productList.pagination.setActivePage();
            }
        };

        /**
         * Handle backward (previous) pagination navigation
         */
        productList.pagination.pageBack = function()
        {
            if(productList.pagination.currentPage > 1)
            {
                productList.pagination.currentPage--;
                productList.renderPage();
                productList.pagination.setActivePage();
            }
        };

        /**
         * Handle click event for next page button
         */
        $('ul.shop-pagination').on('click', 'a.next', function()
        {
            productList.pagination.pageForward();
        });

        /**
         * Handle click event for previous page button
         */
        $('ul.shop-pagination').on('click', 'a.prev', function()
        {
            productList.pagination.pageBack();
        });

        /**
         * Set the pagination links when the page is rendered/re-rendered.
         */
        productList.pagination.setPageLinks = function()
        {
            $('li.pagiNav').remove();
            var navEnd = $('li.pag-last');
            for(var p = 0; p < productList.pagination.pageCount; p++)
            {
                var pagiNavClass = 'pagiNav';
                if(productList.pagination.currentPage == (p+1))
                {
                    pagiNavClass += ' active';
                }
                var pagiHtml = '<li class="' + pagiNavClass + '"><a href="#">' + (p+1) + '</a></li>';
                navEnd.before(pagiHtml);
            }
        };

        /**
         * Get the page count based on total products / products per page.
         */
        productList.pagination.getPageCount = function()
        {
            var totModPages = (productList.getProductCount() % productList.pagination.prodPerPage);
            productList.pagination.pageCount = (totModPages > 0) ? (Math.floor(productList.getProductCount() / productList.pagination.prodPerPage) + 1) : Math.floor(productList.getProductCount() / productList.pagination.prodPerPage);
        };

        /**
         * Create the individual "pages" (assuming product count > product per page).
         */
        productList.pagination.setPages = function()
        {
            //Determine which list to use (full or filtered)
            var f = productList.filters.checkFilters();
            var d = f ? productList.filters.filteredList : productList.Json;
            var counter = 0;
            var page = 0;
            productList.pagination.getPageCount();
            //Create new pages
            for(var i = 0; i <= productList.pagination.pageCount; i++)
            {
                productList.pagination.pages[i] = new Array();
            }

            //Add products to pages
            for(var i = 0; i < productList.getProductCount(); i++)
            {
                if(counter < productList.pagination.prodPerPage)
                {
                    productList.pagination.pages[page].push(d[i]);
                    counter++;
                } else if(counter >= productList.pagination.prodPerPage)
                {
                    counter = 0;
                    page++;
                    productList.pagination.pages[page].push(d[i]);
                    counter++;
                }
            }
        };

        //Define the product container element
        productList.container = $('div#product-content');
        //Create product list object
        productList.Json = {!! $products !!};

        /**
         * Handle the rendering of the page.
         */
        productList.renderPage = function()
        {
            //Set the page to 0 since it is currently set to the human readable integer 1.
            var page = productList.pagination.currentPage - 1;
            //Assign the first image in the array as the product image.
            //If no images exist for product, then assign placeholder image as primary image.
            for(var p in productList.pagination.pages[page])
            {
                var img = productList.pagination.pages[page][p].images;
                if(img[0] !== undefined) {
                    productList.pagination.pages[page][p].cover_photo = img[0]['image_path'];
                }else {
                    productList.pagination.pages[page][p].cover_photo = 'http://placehold.it/221x221';
                }
            }
            //Render the product list
            var view = $("#product-list-template").html();
            var template = Handlebars.compile(view);
            var json = {
                products: productList.pagination.pages[page]
            };

            var html = template(json);
            productList.container.empty();
            productList.container.append(html);
        };

        //Filters
        productList.filters = window.productList.filters || {}
        //Create the manufacturer array
        productList.filters.manufacturers = new Array();
        //Create the categories array
        productList.filters.categories = new Array();
        //Default the category filter to all categories
        productList.filters.catFilter = 'Category (All)';
        //Default the manufacturer filter to all manufacturers
        productList.filters.manFilter = 'Manufacturer (All)';

        /**
         * Check if there are any active filters.
         *
         * @returns {boolean}
         */
        productList.filters.checkFilters = function()
        {
            if(productList.filters.catFilter !== 'Category (All)' || productList.filters.manFilter !== 'Manufacturer (All)')
            {
                return true;
            }
            return false;
        };

        /**
         * Apply the selected filter(s).
         */
        productList.filters.applyFilters = function()
        {
            //Create the filterdProducts array
            productList.filters.filteredList = new Array();
            for(var p in productList.Json)
            {
                productList.filters.filteredList.push(productList.Json[p]);
            }
            //Filter out categories
            if(productList.filters.catFilter !== 'Category (All)')
            {
                //for(var f in productList.filters.filteredList)
                for(var i = productList.filters.filteredList.length; i--;)
                {
                    if(productList.filters.filteredList[i].category.category != productList.filters.catFilter)
                    {
                        productList.filters.filteredList.splice(i, 1);
                    }
                }
            }

            /**
             * Handle filter by manufacturer.
             */
            if(productList.filters.manFilter !== 'Manufacturer (All)')
            {
                for(var i = productList.filters.filteredList.length; i--;)
                {
                    if(productList.filters.filteredList[i].manufacturer.manufacturer != productList.filters.manFilter)
                    {
                        productList.filters.filteredList.splice(i, 1);
                    }
                }
            }
            productList.pagination.setPages();
            productList.pagination.getPageCount();
            productList.pagination.setPageLinks();
            productList.renderPage();
            productList.pagination.pageByNumber();
            productList.pagination.currentPage = 1;
            productList.renderPage();
            productList.pagination.setActivePage()
        };

        /**
         * Handle category filter changes.
         */
        $('ul#categoryFilter').on('click', 'a', function()
        {
            var cat = $(this).text();
            $('span.filter-category-label').text(cat);
            productList.filters.catFilter = cat;
            productList.filters.applyFilters();
        });

        /**
         * Handle manufacturer filter changes.
         */
        $('ul#manufacturerFilter').on('click', 'a', function()
        {
            var man = $(this).text();
            $('span.filter-manufacturer-label').text(man);
            productList.filters.manFilter = man;
            productList.filters.applyFilters();
        });

        /**
         * Create a list of all manufacturers.
         */
        productList.filters.getManufacturers = function()
        {
            var f = productList.filters.checkFilters();
            var d = f ? productList.filters.filteredList : productList.Json;
            for(var p in d)
            {
                var m = d[p].manufacturer.manufacturer;
                if(productList.filters.manufacturers.indexOf(m) === -1) {
                    productList.filters.manufacturers.push(m);
                }
            }
        };

        /**
         * Populate the manufacturer filter dropdown.
         */
        productList.filters.genManufacturerFilter = function()
        {
            for(var m in productList.filters.manufacturers)
            {
                var li = '<li role="presentation"><a role="menuitem" tabindex="-1">' + productList.filters.manufacturers[m] + '</a></li>';
                $('ul#manufacturerFilter').append(li);
            }
        };

        /**
         * Create a list of all categories.
         */
        productList.filters.getCategories = function()
        {
            var f = productList.filters.checkFilters();
            var d = f ? productList.filters.filteredList : productList.Json;
            for(var c in d)
            {

                var c = d[c].category.category;
                if(productList.filters.categories.indexOf(c) === -1)
                {
                    productList.filters.categories.push(c);
                }
            }
        };

        /**
         * Populate the category list dropdown.
         */
        productList.filters.genCategoryFilter = function()
        {
            for(var c in productList.filters.categories)
            {
                var li = '<li role="presentation"><a role="menuitem" tabindex="-1"">' + productList.filters.categories[c] + '</a></li>';
                $('ul#categoryFilter').append(li);
            }
        };

        /**
         * Get the total product count.
         *
         * @returns {number}
         */
        productList.getProductCount = function()
        {
            var d = productList.filters.checkFilters() ? productList.filters.filteredList : productList.Json;
            var i = 0;
            for(var p in d)
            {
                if(d.hasOwnProperty(p))
                {
                    i++;
                }
            }
            return i;
        };

        productList.init = function()
        {
            //INITIALIZATION METHOD CALLS
            productList.pagination.setPages();
            productList.filters.getManufacturers();
            productList.filters.genManufacturerFilter();
            productList.filters.getCategories();
            productList.filters.genCategoryFilter();
            productList.renderPage();
            productList.pagination.setPageLinks();
            productList.pagination.setActivePage();
            productList.pagination.pageByNumber();
            productList.pagination.setProdPerPage();
        };

        /**
         * Initialize the product list methods.
         */
        productList.init();

    </script>
@stop