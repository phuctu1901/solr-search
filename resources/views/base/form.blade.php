{{-- su dung method Get: --}}
<div class="col-md-12" style="float: left;">
        <div class="row">
            <div class="col-sm-9 col-sm-offset-3">
                {{-- <div id="imaginary_container" class="col-md-12"> --}}
                <div class="col-md-8">
                    <a href="/">
                    <img src="uploads/images/logo.png" alt="" width="350px" height="100px">
                    </a>
                    <br><br>
                    <form action="solr/api/get/base" method="GET" accept-charset="utf-8" autocomplete="off">
                        <input type="hidden" name="_token" value="{{csrf_token()}}" />
                        <div class="input-group stylish-input-group input-append">
                            <input type="text" class="form-control" list="suggestions"  placeholder="Số báo danh" name="search" id="key_search" required=""
                            @isset ($key)
                                value="{{ $key }}" 
                            @endisset
                            >
                            @isset ($suggestions)
                            <datalist id="suggestions">
                                @foreach ($suggestions as $sugg)
                                    <option value="{{ $sugg->key }}"></option>
                                @endforeach                              
                            </datalist>
                            @endisset

                            <span class="input-group-addon">
                                <button type="submit">
                                    <span class="glyphicon glyphicon-search"></span>
                                </button>  
                            </span>
                        </div>
                    </form>

                </div>
            </div>
        </div>
</div>