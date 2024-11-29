
<form action="{{ request()->segment(2) == 'product' ? 'shop' : '' }}">
    <div class="filter-widget">
        <h4 class="fw-title">Categories</h4>
        <ul class="filter-catagories">

            @foreach($categories as $category)
                <li><a href="shop/category/{{ $category->name }}">{{ $category->name }}</a></li>
            @endforeach

        </ul>
    </div>
    <div class="filter-widget">
        <h4 class="fw-title">Brand</h4>
        <div class="fw-brand-check">

            @foreach($brands as $brand)
                <div class="bc-item">
                    <label for="bc-{{ $brand->id }}">
                        {{ $brand->name }}
                        <input type="checkbox"
                               {{ (request("brand")[$brand->id] ?? '') == 'on' ? 'checked' : '' }}
                               id="bc-{{ $brand->id }}"
                               name="brand[{{ $brand->id }}]"
                               onchange="this.form.submit();">
                        <span class="checkmark"></span>
                    </label>
                </div>
            @endforeach

        </div>
    </div>
    <div class="filter-widget">
        <h4 class="fw-title">Price</h4>
        <div class="filter-range-wrap">
            <div class="range-slider">
                <div class="price-input">
                    <input type="text" id="minamount" name="price_min">
                    <input type="text" id="maxamount" name="price_max">
                </div>
            </div>
            <div class="price-range ui-slide ui-corner-all ui-slider-horizontal ui-widget ui-widget-content"
                 data-min="10000" data-max="10000000"
                 data-min-value="{{ str_replace('$', '', request('price_min')) }}"
                 data-max-value="{{ str_replace('$', '', request('price_max')) }}">
                <div class="ui-slider-range ui-corner-all ui-widget-header"></div>
                <span tabindex="0" class="ui-slider-handle ui-corner-all ui-state-default"></span>
                <span tabindex="0" class="ui-slider-handle ui-corner-all ui-state-default"></span>
            </div>
        </div>

        <button type="submit" class="filter-btn">FILTER</button>
    </div>
    <div class="filter-widget">
        <h4 class="fw-title">Color</h4>
        <div class="fw-color-choose">
            <div class="cs-item">
                <input type="radio" id="cs-black" name="color" value="black" onchange="this.form.submit();"
                    {{ request('color') == 'black' ? 'checked' : '' }} >
                <label class="cs-black {{ request('color') == 'black' ? 'font-weight-bold' : '' }}" for="cs-black">Black</label>
            </div>
            <div class="cs-item">
                <input type="radio" id="cs-violet" name="color" value="violet" onchange="this.form.submit();"
                    {{ request('color') == 'violet' ? 'checked' : '' }} >
                <label class="cs-violet {{ request('color') == 'violet' ? 'font-weight-bold' : '' }}" for="cs-violet">Violet</label>
            </div>
            <div class="cs-item">
                <input type="radio" id="cs-blue" name="color" value="blue" onchange="this.form.submit();"
                    {{ request('color') == 'blue' ? 'checked' : '' }} >
                <label class="cs-blue {{ request('color') == 'blue' ? 'font-weight-bold' : '' }}" for="cs-blue">Blue</label>
            </div>
            <div class="cs-item">
                <input type="radio" id="cs-red" name="color" value="red" onchange="this.form.submit();"
                    {{ request('color') == 'red' ? 'checked' : '' }} >
                <label class="cs-red {{ request('color') == 'red' ? 'font-weight-bold' : '' }}" for="cs-red">Red</label>
            </div>
            <div class="cs-item">
                <input type="radio" id="cs-yellow" name="color" value="yellow" onchange="this.form.submit();"
                    {{ request('color') == 'yellow' ? 'checked' : '' }} >
                <label class="cs-yellow {{ request('color') == 'yellow' ? 'font-weight-bold' : '' }}" for="cs-yellow">Yellow</label>
            </div>
            <div class="cs-item">
                <input type="radio" id="cs-green" name="color" value="green" onchange="this.form.submit();"
                    {{ request('color') == 'green' ? 'checked' : '' }} >
                <label class="cs-green {{ request('color') == 'green' ? 'font-weight-bold' : '' }}" for="cs-green">Green</label>
            </div>
        </div>
    </div>
    <div class="filter-widget">
        <h4 class="fw-title">Size</h4>
        <div class="fw-size-choose">
            <div class="sc-item">
                <input type="radio" id="38-size" name="size" value="38" onchange="this.form.submit();"
                    {{ request('size') == '38' ? 'checked' : '' }} >
                <label for="38-size" class="{{ request('size') =='38' ? 'active' : '' }}">38</label>
            </div>
            <div class="sc-item">
                <input type="radio" id="39-size" name="size" value="39" onchange="this.form.submit();"
                    {{ request('size') == '39' ? 'checked' : '' }} >
                <label for="39-size" class="{{ request('size') =='39' ? 'active' : '' }}">39</label>
            </div>
            <div class="sc-item">
                <input type="radio" id="40-size" name="size" value="40" onchange="this.form.submit();"
                    {{ request('size') == '40' ? 'checked' : '' }} >
                <label for="40-size" class="{{ request('size') =='40' ? 'active' : '' }}">40</label>
            </div>
            <div class="sc-item">
                <input type="radio" id="41-size" name="size" value="41" onchange="this.form.submit();"
                    {{ request('size') == '41' ? 'checked' : '' }} >
                <label for="41-size" class="{{ request('size') =='41' ? 'active' : '' }}">41</label>
            </div>
            <div class="sc-item">
                <input type="radio" id="42-size" name="size" value="42" onchange="this.form.submit();"
                    {{ request('size') == '42' ? 'checked' : '' }} >
                <label for="42-size" class="{{ request('size') =='42' ? 'active' : '' }}">42</label>
            </div>
            <div class="sc-item">
                <input type="radio" id="43-size" name="size" value="43" onchange="this.form.submit();"
                    {{ request('size') == '43' ? 'checked' : '' }} >
                <label for="43-size" class="{{ request('size') =='43' ? 'active' : '' }}">43</label>
            </div>
        </div>
    </div>

</form>
