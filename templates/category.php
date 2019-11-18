<div class="category-container">

  <select>
    <option value="25">25</option>
    <option value="50">50</option>
    <option value="100">100</option>
  </select>

      <nav class="category-bar">
        <ul>
        <?php
        $products->getCategoriesForNavigation();

         ?>
        </ul>
      </nav>
</div>
