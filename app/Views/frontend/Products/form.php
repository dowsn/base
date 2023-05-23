<div>
  <label for="name">Name</label>
  <input type="text" name="name" id="name" value="<?= old('name', esc($product->name)) ?>">
</div>

<div>
  <label for="price">Price</label>
  <input type="text" name="price" id="price" value="<?= old('price', esc($product->price)) ?>">
</div>

<div>
  <label for="pretty_url">Pretty URL</label>
  <input type="text" name="pretty_url" id="pretty_url" value="<?= old('pretty_url', esc($product->pretty_url)) ?>">
</div>

<button>Save</button>
<a href="<?= site_url("/products") ?>">Cancel</a>