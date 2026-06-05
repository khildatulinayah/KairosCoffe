# TODO
- [x] Fix validation for menu image upload (error: image field must be a string / max 255 KB)
- [x] Update MenusController store() validation rules for `image` to use `file|image|mimes|max` instead of `string|max:255`
- [x] Ensure file is stored (e.g., to `storage/app/public/menu_images`) and persisted in `menus.image` (create)
- [x] Update MenusController update() to use `file|image|mimes|max` and store uploaded file
- [ ] Ensure edit form uses same field name (`image`) and multipart enctype (already present)
- [ ] Add/adjust model fillable/casts if needed
- [ ] Run quick sanity check: php artisan route list (and/or basic validation via unit/manual form submission)


