<?php
session_start();
?>
<!DOCTYPE html>
</head>
    <link rel="stylesheet" type="text/css" href="public/css/style.css">
    <link rel="stylesheet" type="text/css" href="public/css/nav.css">
    <link rel="stylesheet" type="text/css" href="public/css/inventory.css">
    <script src="https://kit.fontawesome.com/8d0c9bc700.js" crossorigin="anonymous"></script>
    <script type="text/javascript" src="./public/js/inventory.js" defer></script>
    <script type="text/javascript" src="./public/js/search_items.js" defer></script>
    <title>My food</title>
</head>
<body>
    <div class="base-container">
        <div class="modal select-item">
            <div class="modal-content">
                <h2 class="text">Add product</h2>
                <form class="add-item" action="addItem" method="POST">
                    <div class="text">Product name</div>
                    <div class="select-item-name">
                        <input name="name" placeholder="name">
                    </div>
                    <div class="text">Category</div>
                    <div class="select-item-category">
                        <select required="required" name="category">
                            <?php foreach ($categories as $category): ?>
                                <option><?= $category; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="text">Quantity</div>
                    <input required="required" name="quantity" placeholder="quantity">
                    <div class="text">Expiration date</div>
                    <input required="required" type="date" name="expDate">
                    <div class="two-buttons">
                        <button type="submit">Add</button>
                        <button type="reset" name="cancelButton" onclick="modal_cancel()">Cancel</button>
                    </div>
                </form>
            </div>
        </div>
        <div class="modal remove-item">
            <div class="modal-content">
                <h2 class="text">Remove product</h2>
                <form class="remove-item" action="removeItem" method="POST">
                    <table class="inventory_table">
                        <thead>

                        </thead>
                        <tbody>
                        <?php foreach ($items as $item): ?>
                            <tr>
                                <td hidden="hidden" class="item-remove-id"><?= $item->getId(); ?></td>
                                <td><?= $item->getName(); ?></td>
                                <td><?= $item->getQuantity(); ?></td>
                                <td><?= $item->getCategory(); ?></td>
                                <td><?= date("d.m.Y", strtotime($item->getExpDate())); ?></td>
                                <td><input type="checkbox" name="test"></td>
                            </tr>
                        <?php endforeach; ?>
                        </tbody>
                    </table>
                    <div class="two-buttons">
                        <button type="submit">Remove</button>
                        <button type="reset" name="cancelButton" onclick="modal_cancel()">Cancel</button>
                    </div>
                </form>
            </div>
        </div>
        <?php include('side_menu.php') ?>
        <main>
            <header>
                <h1>My food</h1>
                <div class="search-bar">
                    <input placeholder="search">
                </div>
                <?php include('account_dropdown.php')?>
            </header>
            <section class="inventory">

                <table class="inventory_table">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Quantity</th>
                            <th>Category</th>
                            <th>Date</th>
                        </tr>
                    </thead>
                    <tbody class="item-container">
                        <?php foreach ($items as $item): ?>
                        <tr>
                            <td><?= $item->getName(); ?></td>
                            <td><?= $item->getQuantity(); ?></td>
                            <td><?= $item->getCategory(); ?></td>
                            <td><?= date("d.m.Y", strtotime($item->getExpDate())); ?></td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </section>
        </main>

    </div>
</body>

<template id="item-template">
    <tr>
        <td id="name">Name</td>
        <td id="quantity">Quantity</td>
        <td id="category">Category</td>
        <td id="exp_date">ExpDate</td>
    </tr>
</template>