<div id="topsearchform">
  <div>
      <span id="tab_t" class="selected">作品で検索</span>
      <span id="tab_c" class="not-selected">キャラクターで検索</span>
  </div>
  <div>
      <form action="/search" method="GET" name="search">
          @csrf
          <input type="search" class="input-text-box" placeholder="検索" name="t">
          <input type="submit" class="search-box fas" id="gbox" value="&#xf002;">                        
      </form>
  </div>
  <style>

  </style>
  <script>

  </script>
</div>