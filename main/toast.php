<div aria-live="polite" aria-atomic="true" style="position: relative; min-height: 200px;">
    <div class="toast" style="position: absolute; top: 0; right: 0;">
        <div class="toast-header">
            <button type="button" class="ml-2 mb-1 close" data-dismiss="toast" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="toast-body">
            <div class="alert alert-<?=$_SESSION['msg_type']?>">
                <?php
            echo $_SESSION['message'];
            unset($_SESSION['message']); 

            ?>

            </div>
        </div>
    </div>
</div>