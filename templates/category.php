<div class="category-container">

      <nav class="category-bar">
        <ul>
        <?php
        $products->getCategoriesForNavigation();

         ?>
        </ul>
      </nav>

      <form action="" method=get>
        <select>
          <option value="25">25</option>
          <option value="50">50</option>
          <option value="100">100</option>
          <input type="submit" value="GO" name="">
        </select>
      </form>

</div>
