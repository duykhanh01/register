# Module Register
[![License: GPL v3](https://img.shields.io/badge/License-GPLv3-blue.svg)](https://www.gnu.org/licenses/gpl-3.0.html)

Module sổ đầu bài điện tử với các chức năng quản lý và hiển thị sổ đầu bài.

# Changelogs
## V1.0.00
- Khởi tạo module sổ đầu bài điện tử

## V1.1.00
- Chức năng cấu hình Sở, phòng, trường.
- Chức năng quản lý lớp
- Chức năng quản lý môn học
- Chức năng quản lý tuần học
- Chức năng quản lý PPCT
- Chức năng quản lý sổ đầu bài

## V1.2.00
- Chức năng import PPCT từ excel

# Setup 

- Tải module tại: https://github.com/duykhanh01/register.git.
- Đăng nhập vào trang quản trị.
- Chọn "Quản lý ứng dụng" trong menu mở rộng.
- Nhấn nút cài đặt gói ứng dụng và chọn file zip vừa tải về.
- Nhấn bỏ qua cảnh báo.
- Chọn "Thiết lập module mới" trong "Quản lý Modules".
- Tìm module có tên "Register" và nhấn thiết lập.
- Thêm dòng sau vào composer.json
    ```
    "require": {
            "phpoffice/phpspreadsheet": "^1.23"
        },
    ```
- Chạy lệnh composer dump-autoload

# Tác giả
- Nguyễn Minh Hiếu
- Ngô Duy Khánh
- Mai Đình Công

# License
[![License: GPL v3](https://img.shields.io/badge/License-GPLv3-blue.svg)](https://www.gnu.org/licenses/gpl-3.0.html)

