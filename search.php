<form action="" method="GET">
    <div class="input-group col-md-12">
        <input type="text" name="search" value="
            <?php if (isset($_GET['search'])) {
                echo $_GET['search'];
            }
            if (empty($_GET['search'])) {
                unset($_GET['search']);
            } ?>
            " class="form-control" placeholder="Search data">
        <button type="submit" class="btn btn-primary">Search</button>
    </div>
</form>