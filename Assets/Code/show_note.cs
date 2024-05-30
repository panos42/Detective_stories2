using UnityEngine;

public class Note : MonoBehaviour
{
    public GameObject noteUIPanel; // Assign the note UI Panel in the inspector
    private PlayerMovement playerMovement;

    void Start()
    {
        Debug.Log("Note script started.");

        playerMovement = GameObject.FindWithTag("Player").GetComponent<PlayerMovement>();

        // Ensure the note UI is initially hidden
        noteUIPanel.SetActive(false);
        Debug.Log("Note UI panel set to inactive.");
    }

    void OnTriggerEnter2D(Collider2D other)
    {
        Debug.Log("Trigger entered.");
        
        if (other.CompareTag("Player")) // Assuming the detective has a tag "Detective"
        {
            Debug.Log("Detective entered the note trigger.");
            Time.timeScale = 0.0000001f; // Pause game
            playerMovement.ToggleMovement(false); // Disable player movement
            ShowNote();
        }
    }

    void Update()
    {
        if (noteUIPanel.activeSelf && Input.GetMouseButtonDown(0)) // Check if the note UI is active and the player clicks
        {
            Debug.Log("Mouse button clicked to hide note.");
            Time.timeScale = 1f; // Resume game
            playerMovement.ToggleMovement(true); // Enable player movement
            HideNote();
        }
    }

    void ShowNote()
    {
        Debug.Log("Showing note.");
        noteUIPanel.SetActive(true);
    }

    void HideNote()
    {
        Debug.Log("Hiding note.");
        noteUIPanel.SetActive(false);
    }
}
