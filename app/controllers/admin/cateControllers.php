<?php
/**
 * SECURE Category Controller
 * Fixed: CSRF protection, input validation, XSS prevention, authorization
 */

// Authorization check - only Admin and Editor can access
requireAuth([1, 2]);

if(isset($_GET['type1'])){
    if($_GET['type1']=='fixcate'){
        // EDIT CATEGORY
        
        // Validate ID
        if(!isset($_GET['id']) || !validateId($_GET['id'])){
            setFlashMessage('error', 'ID không hợp lệ');
            safeRedirect('index.php?type=cate');
        }
        
        if(isset($_POST['btn-save-cate'])){
            // Verify CSRF token
            if(!isset($_POST['csrf_token']) || !verifyCsrfToken($_POST['csrf_token'])){
                setFlashMessage('error', 'Yêu cầu không hợp lệ. Vui lòng thử lại.');
                safeRedirect('index.php?type=cate&type1=fixcate&id=' . $_GET['id']);
            }
            
            // Validate input
            $nameCategory = sanitizeInput($_POST['nameCategory']);
            
            if(empty($nameCategory)){
                setFlashMessage('error', 'Tên danh mục không được để trống');
            }
            elseif(strlen($nameCategory) > 255){
                setFlashMessage('error', 'Tên danh mục quá dài (tối đa 255 ký tự)');
            }
            else{
                if(updateCate($nameCategory, $_GET['id'])){
                    setFlashMessage('success', 'Cập nhật danh mục thành công');
                }else{
                    setFlashMessage('error', 'Cập nhật danh mục thất bại');
                }
            }
            safeRedirect('index.php?type=cate&type1=fixcate&id=' . $_GET['id']);
        }
        
        $getCategoryById1 = getCategoryById1($_GET['id']);
        
        // Check if category exists
        if(!$getCategoryById1){
            setFlashMessage('error', 'Danh mục không tồn tại');
            safeRedirect('index.php?type=cate');
        }
        
        include_once("app/views/admin/fixcate.views.php");
        
    }else if($_GET['type1']=='addcate'){
        // ADD CATEGORY
        
        if(isset($_POST['btn-add-cate'])){
            // Verify CSRF token
            if(!isset($_POST['csrf_token']) || !verifyCsrfToken($_POST['csrf_token'])){
                setFlashMessage('error', 'Yêu cầu không hợp lệ. Vui lòng thử lại.');
                safeRedirect('index.php?type=cate&type1=addcate');
            }
            
            // Rate limiting
            if(!checkRateLimit('add_category', 10, 60)){
                setFlashMessage('error', 'Bạn đang thao tác quá nhanh. Vui lòng đợi một chút.');
                safeRedirect('index.php?type=cate&type1=addcate');
            }
            
            // Validate input
            $nameCategory = sanitizeInput($_POST['nameCategory']);
            
            if(empty($nameCategory)){
                setFlashMessage('error', 'Tên danh mục không được để trống');
            }
            elseif(strlen($nameCategory) > 255){
                setFlashMessage('error', 'Tên danh mục quá dài (tối đa 255 ký tự)');
            }
            else{
                if(addCate($nameCategory)){
                    setFlashMessage('success', 'Thêm danh mục thành công');
                    safeRedirect('index.php?type=cate');
                }else{
                    setFlashMessage('error', 'Thêm danh mục thất bại');
                }
            }
        }
        
        include_once("app/views/admin/addcate.views.php");
    }
    
}else{
    // LIST CATEGORIES
    
    // Handle hide action
    if(isset($_GET['hide'])){
        if(!validateId($_GET['hide'])){
            setFlashMessage('error', 'ID không hợp lệ');
        }else{
            if(hideCate($_GET['hide'])){
                setFlashMessage('success', 'Ẩn danh mục thành công');
            }else{
                setFlashMessage('error', 'Ẩn danh mục thất bại');
            }
        }
        safeRedirect('index.php?type=cate');
    }
    
    // Handle unhide action
    if(isset($_GET['unhide'])){
        if(!validateId($_GET['unhide'])){
            setFlashMessage('error', 'ID không hợp lệ');
        }else{
            if(unHideCate($_GET['unhide'])){
                setFlashMessage('success', 'Bỏ ẩn danh mục thành công');
            }else{
                setFlashMessage('error', 'Bỏ ẩn danh mục thất bại');
            }
        }
        safeRedirect('index.php?type=cate');
    }
    
    $getAllCategory1 = getAllCategory1();
    include_once("app/views/admin/cate.views.php");
}
