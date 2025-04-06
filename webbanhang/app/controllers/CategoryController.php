<?php
// Require necessary files
require_once('app/config/database.php');
require_once('app/models/CategoryModel.php');

class CategoryController
{
    private $categoryModel;
    private $db;

    public function __construct()
    {
        $this->db = (new Database())->getConnection();
        $this->categoryModel = new CategoryModel($this->db);
    }

    // Display a list of categories
    public function list()
    {
        $categories = $this->categoryModel->getCategories();
        include 'app/views/category/list.php';
    }

    // Show the form to add a category
    public function addForm()
    {
        include 'app/views/category/add.php';
    }

    // Handle adding a new category
    public function add()
    {
        // Get form data
        $name = $_POST['name'] ?? '';
        $description = $_POST['description'] ?? '';

        // Sanitize inputs
        $name = htmlspecialchars(strip_tags($name));
        $description = htmlspecialchars(strip_tags($description));

        // Validate the input data
        $errors = [];
        if (empty($name)) {
            $errors[] = "Category name is required.";
        }

        if (empty($description)) {
            $errors[] = "Description is required.";
        }

        // If there are errors, return to the form with the errors
        if (!empty($errors)) {
            // Pass errors and form data back to the view
            include 'app/views/category/add.php';
            return;
        }

        // Try to add the category
        $isAdded = $this->categoryModel->addCategory($name, $description);

        if ($isAdded) {
            // Redirect to the category list page on success
            header("Location: /webbanhang/Category/list");
            exit;
        } else {
            // If adding failed, show an error message
            echo "Failed to add category.";
        }
    }

    // Show the form to edit a category
    public function editForm($id)
    {
        $category = $this->categoryModel->getCategoryById($id);
        if ($category) {
            include 'app/views/category/edit.php';
        } else {
            echo "Category not found.";
        }
    }

    // Handle editing a category
    public function edit($id)
    {
        $name = $_POST['name'] ?? '';
        $description = $_POST['description'] ?? '';

        // Sanitize inputs
        $name = htmlspecialchars(strip_tags($name));
        $description = htmlspecialchars(strip_tags($description));

        // Validate the input data
        $errors = [];
        if (empty($name)) {
            $errors[] = "Category name is required.";
        }

        if (empty($description)) {
            $errors[] = "Description is required.";
        }

        // If there are errors, return to the form with the errors
        if (!empty($errors)) {
            // Pass errors and form data back to the view
            include 'app/views/category/edit.php';
            return;
        }

        $isUpdated = $this->categoryModel->updateCategory($id, $name, $description);

        if ($isUpdated) {
            // Redirect to the category list page on success
            header("Location: /webbanhang/Category/list");
            exit;
        } else {
            // If update failed, show an error message
            echo "Failed to update category.";
        }
    }

    // Handle deleting a category
    public function delete($id)
    {
        $isDeleted = $this->categoryModel->deleteCategory($id);

        if ($isDeleted) {
            // Redirect to the category list page on success
            header("Location: /webbanhang/Category/list");
            exit;
        } else {
            // If delete failed, show an error message
            echo "Failed to delete category.";
        }
    }
}
?>
