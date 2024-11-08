<div class="card">
    <div class="card-header pb-0">
        <h6>Products</h6>
    </div>
    <div class="card-body px-0 pt-0 pb-2">
        <div class="table-responsive p-0">
            <table class="table align-items-center mb-0">
                <thead>
                <tr>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Product</th>
                    <th class="text-secondary opacity-7"></th>
                </tr>
                </thead>
                <tbody>
                <?php

                foreach ($params as $param) {
                    echo "<tr>";
                    echo "<td>";
                    echo "<div class='d-flex px-2 py-1'>";
                    echo "<div>";
                    echo "<img src='../assets/img/team-2.jpg' class='avatar avatar-sm me-3' alt='user1'>";
                    echo "</div>";
                    echo "<div class='d-flex flex-column justify-content-center'>";
                    echo "<h6 class='mb-0 text-sm'>$param[name]</h6>";
                    echo "<p class='text-xs text-secondary mb-0'>$param[description]</p>";
                    echo "</div>";
                    echo "</div>";
                    echo " </td>";
                    echo "<td class='align-middle'>";
                    echo "<a href='/updateProduct?id=$param[id]' target='_blank' class='text-secondary font-weight-bold text-xs' data-toggle='tooltip' data-original-title='Edit user'>";
                    echo "Edit";
                    echo "</a>";
                    echo " </td>";
                    echo "  </tr>";
                }
                ?>
                </tbody>
            </table>
        </div>
    </div>
</div>