using UnityEngine;

public class PlayerMovement : MonoBehaviour
{
    public float moveSpeed = 0.5f;

    public Rigidbody2D rb;
    public Animator animator;

    private bool canMove = true;
    Vector2 movement;

    // Update is called once per frame
    void Update()
    {
        if (canMove)
        {
            movement.x = Input.GetAxisRaw("Horizontal");
            movement.y = Input.GetAxisRaw("Vertical");

            animator.SetFloat("Horizontal", movement.x);
            animator.SetFloat("Vertical", movement.y);
            animator.SetFloat("Speed", movement.sqrMagnitude);
        }
        else
        {
            movement = Vector2.zero;
            animator.SetFloat("Speed", 0);
        }
    }

    void FixedUpdate()
    {
        if (canMove)
        {
            rb.MovePosition(rb.position + movement * moveSpeed * Time.fixedDeltaTime);
        }
    }

    public void ToggleMovement(bool toggle)
    {
        canMove = toggle;
    }
}
