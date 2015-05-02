<script id="product-list-template" type="text/x-handlebars-template">
    {{#products}}
    <div class="col-sm-3 product">
        <div class="panel panel-default">
            <div class="panel-body">
                <a class="thumbnail" href="/products/{{product_id}}">
                    <img src="{{cover_photo}}">
                </a>
                <div class="text-center">
                    <a href="/products/{{product_id}}">
                        <h3>{{name}}</h3>
                    </a>
                    <a href="/products/{{product_id}}">
                        <h4>{{manufacturer.manufacturer}}</h4>
                    </a>
                    <div class="labelMargin">
                        <span class="label label-info price-label">Price: ${{price}}</span>
                    </div>
                    {{#if sale_price}}
                    <div class="labelMargin">
                        <span class="label label-danger price-label">Sale: ${{sale_price}}</span>
                    </div>
                    {{/if}}
                    <p class="text-center short-desc">{{short_desc}}</p>
                    <p class="text-center">
                        <a role="button" class="btn btn-primary btn-success" href="/products/{{product_id}}">View</a>
                    </p>
                </div>
            </div>
        </div>
    </div>
    {{/products}}
</script>