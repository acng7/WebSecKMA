<?php
// Authorization check - Authors can access
requireAuth([1, 2, 3]);

if(isset($_GET['type1'])){
    if($_GET['type1']=='fixpost'){
        // EDIT POST
        
        if(!isset($_GET['id']) || !validateId($_GET['id'])){
            setFlashMessage('error', 'ID không hợp lệ');
            safeRedirect('index.php?type=postself');
        }
        
        if(isset($_POST['btn-save-post'])){
            // Verify CSRF token
            if(!isset($_POST['csrf_token']) || !verifyCsrfToken($_POST['csrf_token'])){
                setFlashMessage('error', 'Yêu cầu không hợp lệ. Vui lòng thử lại.');
                safeRedirect('index.php?type=postself&type1=fixpost&id=' . $_GET['id']);
            }
            
            // Validate inputs
            $postName = sanitizeInput($_POST['postName']);
            $postImage = sanitizeInput($_POST['postImage']);
            $postDescription = sanitizeInput($_POST['postDescription']);
            $postContent = sanitizeInput($_POST['postContent']);
            
            if(empty($postName) || empty($postImage) || empty($postDescription) || empty($postContent)){
                setFlashMessage('error', 'Vui lòng điền đầy đủ thông tin');
            }elseif(!validateImageUrl($postImage)){
                setFlashMessage('error', 'URL hình ảnh không hợp lệ');
            }else{
                if(updatePost($postName, $postImage, $postDescription, $postContent, $_GET['id'], $_SESSION['user']['id_user'])){
                    setFlashMessage('success', 'Cập nhật bài viết thành công. Chờ duyệt.');
                }else{
                    setFlashMessage('error', 'Cập nhật bài viết thất bại');
                }
            }
            safeRedirect('index.php?type=postself&type1=fixpost&id=' . $_GET['id']);
        }
        
        $getPostByIdAndIdAuthor = getPostByIdAndIdAuthor($_SESSION['user']['id_user'], $_GET['id']);
        
        if(!$getPostByIdAndIdAuthor){
            setFlashMessage('error', 'Bài viết không tồn tại hoặc bạn không có quyền chỉnh sửa');
            safeRedirect('index.php?type=postself');
        }
        
        include_once("app/views/admin/fixpost.views.php");
        
    }elseif($_GET['type1']=='addpost'){
        // ADD POST
        
        if(isset($_POST['btn-add-post'])){
            // Verify CSRF token
            if(!isset($_POST['csrf_token']) || !verifyCsrfToken($_POST['csrf_token'])){
                setFlashMessage('error', 'Yêu cầu không hợp lệ. Vui lòng thử lại.');
                safeRedirect('index.php?type=postself&type1=addpost');
            }
            
            // Rate limiting
            if(!checkRateLimit('add_post', 5, 60)){
                setFlashMessage('error', 'Bạn đang thêm bài viết quá nhanh. Vui lòng đợi.');
                safeRedirect('index.php?type=postself&type1=addpost');
            }
            
            // Validate inputs
            $postName = sanitizeInput($_POST['postName']);
            $postImage = sanitizeInput($_POST['postImage']);
            $postDescription = sanitizeInput($_POST['postDescription']);
            $postContent = sanitizeInput($_POST['postContent']);
            
            if(empty($postName) || empty($postImage) || empty($postDescription) || empty($postContent)){
                setFlashMessage('error', 'Vui lòng điền đầy đủ thông tin');
            }elseif(!validateImageUrl($postImage)){
                setFlashMessage('error', 'URL hình ảnh không hợp lệ');
            }else{
                if(addPost($postName, $postImage, $postDescription, $postContent, $_SESSION['user']['id_user'])){
                    setFlashMessage('success', 'Thêm bài viết thành công. Chờ duyệt.');
                    safeRedirect('index.php?type=postself');
                }else{
                    setFlashMessage('error', 'Thêm bài viết thất bại');
                }
            }
        }
        
        include_once("app/views/admin/addpost.views.php");
    }
    
}else{
    // LIST OWN POSTS
    
    if(isset($_GET['del'])){
        if(!validateId($_GET['del'])){
            setFlashMessage('error', 'ID không hợp lệ');
        }else{
            if(delPostRequest($_GET['del'])){
                setFlashMessage('success', 'Yêu cầu xóa bài viết thành công. Chờ duyệt.');
            }else{
                setFlashMessage('error', 'Yêu cầu xóa thất bại');
            }
        }
        safeRedirect('index.php?type=postself');
    }
    
    if(isset($_GET['restore'])){
        if(!validateId($_GET['restore'])){
            setFlashMessage('error', 'ID không hợp lệ');
        }else{
            if(restorePostRequest($_GET['restore'])){
                setFlashMessage('success', 'Khôi phục bài viết thành công');
            }else{
                setFlashMessage('error', 'Khôi phục bài viết thất bại');
            }
        }
        safeRedirect('index.php?type=postself');
    }
    
    $getAllPostByIdAuthor = getAllPostByIdAuthor($_SESSION['user']['id_user']);
    include_once("app/views/admin/postself.views.php");
}
