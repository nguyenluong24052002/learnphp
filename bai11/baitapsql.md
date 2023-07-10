## 1 Lấy ra tất cả user có giới tính là nữ
- SELECT * FROM users WHERE gender = '2';

## 2 Lấy ra tất cả các user có giới tính là nam:
- SELECT * FROM users WHERE gender = '1';

## 3 Lấy ra tất cả user có giới tính là nữ và thuộc hộ gia đình có ID là 1:
- SELECT * FROM users WHERE gender = '2' AND family_id = 1;

## 4 Lấy ra tất cả user có giới tính là Nam và thuộc hộ gia đình có ID là 1:
- SELECT * FROM users WHERE gender = '1' AND family_id = 1;

## 5 Lấy ra những user có ngày sinh vào ngày 2023-07-31;
- SELECT * FROM users WHERE birthday =  '2023-07-31';

## 6 Lấy ra những gia đình có 2 thành viên trở lên:
- SELECT family_id FROM users GROUP BY family_id HAVING COUNT(*) >= 2;

## 7 Lấy ra những gia đình ko có thành viên nào:
- SELECT f.id FROM families f LEFT JOIN users u ON f.id = u.family_id WHERE u.family_id IS NULL;

## 8 Lấy ra những gia đình có con sinh ngày 2023-07-31:
- SELECT DISTINCT family_id FROM users WHERE DATE(birthday) = '2023-07-31';

## 9 Lấy ra những gia đình có con là nữ:
- SELECT DISTINCT family_id FROM users WHERE gender = '2';

## 10 Lấy ra những gia đình có con là nam:
- SELECT DISTINCT family_id FROM users WHERE gender = '1';

## 11 Lấy ra những user thuộc từ 2 team trở lên
-SELECT user_id FROM user_groups GROUP BY user_id HAVING COUNT(DISTINCT group_id) >= 2;

## 12 Lấy ra những user không thuộc team nào
-SELECT user_id FROM users WHERE user_id NOT IN (SELECT DISTINCT user_id FROM user_groups);

## 13 Lấy ra những team chỉ có thành là nữ
-SELECT g.group_id FROM groups g LEFT JOIN users u ON g.user_id = u.user_id WHERE u.gender = '2' GROUP BY g.group_id HAVING COUNT(*) = COUNT(u.gender);

## 14  Lấy ra những team chỉ có thành là Nam
-SELECT g.group_id FROM groups g LEFT JOIN users u ON g.user_id = u.user_id WHERE u.gender = '1' GROUP BY g.group_id HAVING COUNT(*) = COUNT(u.gender);

## 15 Lấy ra danh sách hộ gia đình và số thành viên tương ứng của hộ gia đình đó 
- SELECT family_id, COUNT(*) AS thanhvien FROM users GROUP BY family_id;

    