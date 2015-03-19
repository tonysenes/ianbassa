<?php
/**
 * The template for displaying Comments.
 *
 * The area of the page that contains both current comments
 * and the comment form. The actual display of comments is
 * handled by a callback to twentyeleven_comment() which is
 * located in the functions.php file.
 *
 * @package WordPress
 * @subpackage Twenty_Eleven
 * @since Twenty Eleven 1.0
 */
?>

<div class="applause_comments">
    <h3><?php comments_number( __( 'No Responses', 'applause'), __( '1 Response', 'applause'), __( '% Responses', 'applause') ); ?></h3>

 
    <div class="mt">
          <ul>  
            <?php
function mt_format_comment($comment, $args, $depth) {
  $GLOBALS['comment'] = $comment; ?>
  <li <?php comment_class(); ?> id="li-comment-<?php comment_ID() ?>">

                        <div id="comment-<?php comment_ID() ?>" class="com">
                                <?php echo get_avatar( $comment, $size='60' ); ?>
                              <div class="comment-text">
                                <h5><cite><?php comment_author_link(); ?></cite> <small> <?php comment_date( 'd M y @ g:i A ' ); ?></small> <?php comment_reply_link( array_merge( $args, array( 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ); ?></h5>
                                      <?php if ($comment->comment_approved == '0') : ?>
                                       <em><?php _e( 'Your comment is awaiting moderation.', 'idea'); ?></em>
                                      <?php endif; ?>
                                      <?php comment_text() ?>
                              </div>
                            </div>



<?php } ?>
                <?php wp_list_comments( array( 'callback' => 'mt_format_comment' ) );?>

          </ul>
      </div>  



                           <?php paginate_comments_links('prev_text=back&next_text=forward'); ?>


<?php if ( get_option('comment_registration') && !is_user_logged_in() ) : ?>
<p>You must be <a href="<?php echo wp_login_url( get_permalink() ); ?>">logged in</a> to post a comment.</p>
<?php else : ?>

  <?php 
  $commenter = wp_get_current_commenter();
  $args = array( 'fields' => apply_filters( 'comment_form_default_fields', array(
    'author' => '<input type="text" class="span5" name="author" placeholder="Your name..." value="' . esc_attr( $commenter['comment_author'] ) . '" required /><br/>',
    'email'  => '<input type="text" class="span5" name="email" placeholder="Your email..." value="' . esc_attr(  $commenter['comment_author_email'] ) . '" required /><br/>',
    'url'    => '<input type="text" class="span5" name="url"  value="' . esc_attr( $commenter['comment_author_url'] ) . '" placeholder="Your website ...." /><br/> ' ) ),
    'comment_field' =>' <textarea id="comment" class="span5" rows="8" name="comment" placeholder="Your mesasge..." data-minlength="20" required></textarea>',
    'must_log_in' => '<p class="must-log-in">' .  sprintf( __( 'You must be logged in to post a comment.', 'applause') ) . '</p>',
    'logged_in_as' => '<p class="logged-in-as">' . sprintf( __( 'Logged in as <a href="%s">%s</a>.</p>', 'applause' ), admin_url( 'profile.php' ), $user_identity ),
    'comment_notes_before' => '',
    'comment_notes_after' => '',
    'id_form' => 'comments-form',
    'id_submit' => 'submit-btn',
    'title_reply' => __( 'Leave a Reply', 'applause' ),
    'title_reply_to' => __( 'Leave a Reply to %s', 'applause'),
    'cancel_reply_link' => __( 'Cancel reply', 'applause' ),
    'label_submit' => __( 'Post Comment', 'applause' ),
  );
  comment_form( $args ); 
  ?>
</div>      
<?php endif; // If registration required and not logged in ?>
	
