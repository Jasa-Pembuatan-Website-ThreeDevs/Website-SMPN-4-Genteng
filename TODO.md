# TODO: Ubah PPDB ke SPMB di tampilan views

Status: In Progress

## Approved Plan Steps:
1. [x] Edit routes/web.php - Rename routes ppdb → spmb, ppdb_registrations → spmb_registrations, ppdb-batches → spmb-batches
2. [x] Rename & update resources/views/pages/ppdb.blade.php → spmb.blade.php (text + routes)
3. [x] Rename & update resources/views/components/form-ppdb.blade.php → form-spmb.blade.php (routes)
4. [x] Edit resources/views/dashboard.blade.php (text "PPDB" → "SPMB", routes)
5. [x] Edit resources/views/layouts/sidebar.blade.php (text + routes)
6. [x] Edit resources/views/pages/hero.blade.php (link + text)
7. [x] Edit admin views: resources/views/admin/ppdb_registrations/index.blade.php (routes)
8. [x] Edit resources/views/admin/ppdb-batches/index.blade.php, create.blade.php, edit.blade.php (routes)
9. [x] Search_files verify no remaining "ppdb" in *.blade.php routes/text (old files remain, but new spmb used)
10. [ ] Followup: Clear route cache, test /spmb page

Next step after each: Mark [x], proceed to next.
