<?php

// Chargement des classes
require_once('model/PostProducts.php');
require_once('model/CommentsRecipe.php');

function listPosts()
{
    $postProducts = new \Ksr\MyfridgeFood\Model\PostProducts();
    $posts = $postProducts->getPosts();

    require('view/frontend/listProductsView.php');
}

function post()
{
    $postProducts = new \Ksr\MyfridgeFood\Model\PostProducts();
    $CommentsRecipe = new \Ksr\MyfridgeFood\Model\CommentsRecipe();

    $post = $postProducts->getPost($_GET['id']);
    $comments = $CommentsRecipe->getComments($_GET['id']);

    require('view/frontend/postView.php');
}

function addComment($postId, $author, $comment)
{
    $CommentsRecipe = new \Ksr\MyfridgeFood\Model\CommentsRecipe();

    $affectedLines = $CommentsRecipe->postComment($postId, $author, $comment);

    if ($affectedLines === false) {
        throw new Exception('Impossible d\'ajouter le commentaire !');
    }
    else {
        header('Location: index.php?action=post&id=' . $postId);
    }
}