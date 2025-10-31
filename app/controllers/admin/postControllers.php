<?php
// Authorization check - only Admin and Editor can access
requireAuth([1, 2]);

if(isset($_GET['type1'])){
    if($_GET['type1']=='seepost'){
        // VIEW POST DETAILS
        
        if(!isset($_GET['id']) || !validateId($_GET['id'])){
            setFlashMessage('error', 'ID không hợp lệ');
            safeRedirect('index.php?type=post');
        }
        
        if(isset($_POST['btn-save-post'])){
            // Verify CSRF token
            if(!isset($_POST['csrf_token']) || !verifyCsrfToken($_POST['csrf_token'])){
                setFlashMessage('error', 'Yêu cầu không hợp lệ. Vui lòng thử lại.');
                safeRedirect('index.php?type=post&type1=seepost&id=' . $_GET['id']);
            }
            
            $note = sanitizeInput($_POST['note']);
            $category_id = filter_var($_POST['category_id'], FILTER_VALIDATE_INT);
            
            if(!$category_id){
                setFlashMessage('error', 'Thể loại không hợp lệ');
            }else{
                if(updatePost1($note, $category_id, $_GET['id'])){
                    setFlashMessage('success', 'Cập nhật thành công');
                }else{
                    setFlashMessage('error', 'Cập nhật thất bại');
                }
            }
            safeRedirect('index.php?type=post&type1=seepost&id=' . $_GET['id']);
        }
        
        $getPostById = getPostById($_GET['id']);
        
        if(!$getPostById){
            setFlashMessage('error', 'Bài viết không tồn tại');
            safeRedirect('index.php?type=post');
        }
        
        $getAllCategory = getAllCategory();
        include_once("app/views/admin/seepost.views.php");
    }
}else{
    // LIST POSTS
    
    if(isset($_GET['del'])){
        if(!validateId($_GET['del'])){
            setFlashMessage('error', 'ID không hợp lệ');
        }else{
            if(delPostConfirm($_GET['del'])){
                setFlashMessage('success', 'Xóa bài viết thành công');
            }else{
                setFlashMessage('error', 'Xóa bài viết thất bại');
            }
        }
        safeRedirect('index.php?type=post');
    }
    
    if(isset($_GET['confirm'])){
        if(!validateId($_GET['confirm'])){
            setFlashMessage('error', 'ID không hợp lệ');
        }else{
            if(acceptPost($_GET['confirm'])){
                setFlashMessage('success', 'Duyệt bài viết thành công');
            }else{
                setFlashMessage('error', 'Duyệt bài viết thất bại');
            }
        }
        safeRedirect('index.php?type=post');
    }
    
    if(isset($_GET['hide'])){
        if(!validateId($_GET['hide'])){
            setFlashMessage('error', 'ID không hợp lệ');
        }else{
            if(hidePost($_GET['hide'])){
                setFlashMessage('success', 'Ẩn bài viết thành công');
            }else{
                setFlashMessage('error', 'Ẩn bài viết thất bại');
            }
        }
        safeRedirect('index.php?type=post');
    }
    
    if(isset($_GET['unhide'])){
        if(!validateId($_GET['unhide'])){
            setFlashMessage('error', 'ID không hợp lệ');
        }else{
            if(unHidePost($_GET['unhide'])){
                setFlashMessage('success', 'Bỏ ẩn bài viết thành công');
            }else{
                setFlashMessage('error', 'Bỏ ẩn bài viết thất bại');
            }
        }
        safeRedirect('index.php?type=post');
    }
    
    $getAllPost1 = getAllPost1();
    include_once("app/views/admin/post.views.php");
}
