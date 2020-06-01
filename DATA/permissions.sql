INSERT INTO `permissions` (`id`, `name`, `display_name`, `parent_id`, `created_at`, `updated_at`) VALUES
    (1, 'user', 'Nhóm Người Dùng', 0, NULL, NULL),
    (2, 'product', 'Nhóm Sản Phẩm', 0, NULL, NULL),
    (3, 'category', 'Nhóm Danh Mục Sản Phẩm', 0, NULL, NULL),
    (4, 'order', 'Nhóm Đơn Hàng', 0, NULL, NULL),
    (5, 'menu', 'Nhóm Menu', 0, NULL, NULL),
    (6, 'supplier', 'Nhóm Nhà Cung Cấp', 0, NULL, NULL),
    (7, 'brand', 'Nhóm Thương Hiệu', 0, NULL, NULL),
    (8, 'slider', 'Nhóm Slider', 0, NULL, NULL),
    (9, 'setting', 'Nhóm Cài Đặt', 0, NULL, NULL),
    (10, 'blog', 'Nhóm Bài Viết', 0, NULL, NULL),
    (11, 'role', 'Nhóm Vai Trò', 0, NULL, NULL),

    (12, 'add-user', 'Thêm Người Dùng', 1, NULL, NULL),
    (12, 'edit-user', 'Sửa Người Dùng', 1, NULL, NULL),
    (13, 'list-user', 'Xem Người Dùng', 1, NULL, NULL),
    (14, 'delete-user', 'Xóa Người Dùng', 1, NULL, NULL),

    (15, 'add-product', 'Thêm Sản Phẩm', 2, NULL, NULL),
    (16, 'edit-product', 'Sửa Sản Phẩm', 2, NULL, NULL),
    (17, 'list-product', 'Xem Sản Phẩm', 2, NULL, NULL),
    (18, 'delete-product', 'Xóa Sản Phẩm', 2, NULL, NULL),

    (19, 'add-category', 'Thêm Danh Mục', 3, NULL, NULL),
    (20, 'edit-category', 'Sửa Danh Mục', 3, NULL, NULL),
    (21, 'delete-category', 'Xóa Danh Mục', 3, NULL, NULL),

    (22, 'list-order', 'Xem Đơn Hàng', 4, NULL, NULL),
    (23, 'update-order', 'Cập Nhật Đơn Hàng', 4, NULL, NULL),
    (24, 'delete-order', 'Xóa Đơn Hàng', 4, NULL, NULL),

    (25, 'add-menu','Thêm Menu', 5, NULL, NULL),
    (26, 'edit-menu','Sửa Menu', 5, NULL, NULL),
    (27, 'delete-menu','Xóa Menu', 5, NULL, NULL),

    (28, 'add-supplier', 'Thêm Nhà Cung Cấp', 6, NULL, NULL),
    (29, 'edit-supplier', 'Sửa Nhà Cung Cấp', 6, NULL, NULL),
    (30, 'delete-supplier', 'Xóa Nhà Cung Cấp', 6, NULL, NULL),

    (31, 'add-brand', 'Thêm Thương Hiệu', 7, NULL, NULL),
    (32, 'edit-brand', 'Sửa Thương Hiệu', 7, NULL, NULL),
    (33, 'delete-brand', 'Xóa Thương hiệu', 7, NULL, NULL),

    (34, 'add-slider', 'Thêm Slider', 8, NULL, NULL),
    (35, 'list-slider', 'Xem Slider', 8, NULL, NULL),
    (36, 'edit-slider', 'Sửa Slider', 8, NULL, NULL),
    (37, 'delete-slider', 'Xóa Slider', 8, NULL, NULL),

    (38, 'add-setting', 'Thêm Cài Đặt', 9, NULL, NULL),
    (39, 'edit-setting', 'Sửa Cài Đặt', 9, NULL, NULL),
    (40, 'delete-setting', 'Xóa Cài Đặt', 9, NULL, NULL),

    (41, 'add-blog', 'Thêm Bài Viết', 10, NULL, NULL),
    (42, 'list-blog', 'Xem Bài Viết', 10, NULL, NULL),
    (43, 'edit-blog', 'Sửa Bài Viết', 10, NULL, NULL),
    (44, 'delete-blog', 'Xóa Bài Viết', 10, NULL, NULL),

    (45, 'add-role', 'Thêm Vai Trò', 11, NULL, NULL),
    (46, 'edit-role', 'Sửa Vai Trò', 11, NULL, NULL),
    (47, 'delete-role', 'Xóa Vai Trò', 11, NULL, NULL);