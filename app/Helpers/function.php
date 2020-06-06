<?php
if (!function_exists('upload_image'))// trả về giá trị TRUE nếu hàm đã tồn tại và  ngược lại FALSE nếu chưa tồn tại. -> neu ham ko ton tai moi thuc hien upload_image
{
/**
* @param $file [tên file trùng tên input]
* @param array $extend [ định dạng file có thể upload được]
* @return array|int [ tham số trả về là 1 mảng - nếu lỗi trả về int ]
*/
function upload_image($file , $folder = '',array $extend = array() )
{
$code = 1;
// lay duong dan anh
$baseFilename = public_path() . '/uploads/' . $_FILES[$file]['name'];
//laravel56/public/upload/tenfile.duoimorong
//Hàm public_path trả về đường dẫn đầy dủ tới thư mục public.
//vi du: <input name="fileupload" type="file" multiple="multiple" /> thi:
//$_FILES['fileupload']['name'] chứa các tên file upload
//$_FILES['fileupload']['type'] các kiểu MIME 41
//$_FILES['fileupload']['tmp_name'] chứa các vị trí lưu tạm file
//$_FILES['fileupload']['error'] mảng báo lỗi
//$_FILES['fileupload']['size'] kích thước file
//$_FILES la 1 biến mảng se lu toan bo thong tin ve file upload
//vi du ve cau truc cua $_FILES la: 
// $_FILE = Array
//     (
//         [file1] => Array
//             (
//                 [name] => 'test2.txt';//một tên file người dùng upload
//                 [type] => text/plain  (kiểu nội dung file text)
//                 [tmp_name] => /tmp/php/php1h4j1 //vị trí lưu file tạm thời trên server.
//                 [error] => UPLOAD_ERR_OK (= 0 là không lỗi)
//                 [size] => 123   (kích thước file - bype)
//             )

//         [file2] => Array
//             (
//                 [name] => test.jpg
//                 [type] => image/jpeg
//                 [tmp_name] => /tmp/php/php6hst32
//                 [error] => UPLOAD_ERR_OK
//                 [size] => 98174
//             )
//     ) 

// thong tin file
$info = new SplFileInfo($baseFilename);
// SplFileInfo la class cap cap thong tin cua file nhu ten, duoi mo rong ...

// duoi file
$ext = strtolower($info->getExtension());
// $info->getExtension() lay duoi mo rong
// kiem tra dinh dang file
if ( ! $extend )
{
$extend = ['png','jpg','jpeg'];
}
if( !in_array($ext,$extend))
{
return $data['code'] = 0;
}
// in_array dùng để kiểm tra giá trị nào đó có tồn tại trong mảng hay không.Nếu như tồn tại thì nó sẽ trả về TRUE và ngược lại sẽ trả về FALSE.

// Tên file mới
$nameFile = trim(str_replace('.'.$ext,'',strtolower($info->getFilename())));
// trim() sẽ loại bỏ khoẳng trắng( hoặc bất kì kí tự nào được cung cấp) dư thừa ở đầu và cuối chuỗi. 
// str_replace($search, $replace, $subject) ; Hàm str_replace() sẽ thay thế tất cả các ký tự $search nằm trong $subject bằng ký tự $replace.
// ham nay co nghia la bo duoi mo rong de lay ten file


$filename = date('Y-m-d__').str_slug($nameFile) . '.' . $ext;
//filename co dang nam-thang-ngay_ten-cua-file-anh.duoimorong

// thu muc goc de upload
$path = public_path().'/uploads/'.date('Y/m/d/');
//laravel56/uploads/nam/thang/ngay

if ($folder)
{
$path = public_path().'/uploads/'.$folder.'/'.date('Y/m/d/');
}
//laravel56/uploads/folder/nam/thang/ngay

if ( !\File::exists($path))
{
mkdir($path,0777,true);
}
//File::exists sẽ kiểm tra xem file hoặc thư mục có tồn tại hay không.
//mkdir — Makes directory , mkdir de tao thu muc voi 0777(mode) la mac dinh, 

// di chuyen file vao thu muc uploads
move_uploaded_file($_FILES[$file]['tmp_name'], $path. $filename);
//

$data = [
'name' => $filename,
'code' => $code,
'path_img' => 'uploads/'.$filename
];
return $data;
//
}
}
if (!function_exists('pare_url_file')) {
function pare_url_file($image,$folder = '')
{
if (!$image)
{
return'/images/no-image.jpg';
}
$explode = explode('__', $image);
if (isset($explode[0])) {
$time = str_replace('_', '/', $explode[0]);
return '/uploads/'.$folder.'/' . date('Y/m/d', strtotime($time)) . '/' . $image;
}
}
}
//Hàm explode() trong php có nhiệm vụ chuyển một chuỗi thành một mảng và mỗi phần tử được cắt bởi một chuỗi con nào đó
//chuoi tren se la 
// Array(
// 	[0] => nam-thang-ngay
// 	[1] => ten-cua-file-anh.duoimorong
// )
//strtotime() sẽ phân tích bất kỳ chuỗi thời gian bằng tiếng anh thành một số nguyên chính là timestamp của thời gian đó. 
  

//ham lay thong tin khi dang nhap  
if (!function_exists('get_data_user'))
{
function get_data_user($type,$field = 'id')
{
return Auth::guard($type)->user() ? Auth::guard($type)->user()->$field : '';
}
}


