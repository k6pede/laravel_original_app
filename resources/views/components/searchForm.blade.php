<div id="searchForm" class="wrap-input-word mb-2">
  <div id="wrap-tab">
      <span id="tab_t" class="selected">作品</span>
      <span id="tab_c" class="not-selected">キャラクター</span>
      <span id="tab_v" class="not-selected">声優</span>
      <script>
          //どのタブが選択されているかによって、inputのnameを変える
          //⇨ 検索方法を切り替える 初期値=t
      </script>
  </div>
  <div class="align-items-center search-box" id="search-box">
      <form action="/search" class="mb-0" method="GET" name="search">
          @csrf
          <input type="search" class="input-text-box" placeholder="検索" name="t">
          <input type="submit" class="search-box fas" id="gbox" value="&#xf002;">                        
      </form>
  </div>
</div>