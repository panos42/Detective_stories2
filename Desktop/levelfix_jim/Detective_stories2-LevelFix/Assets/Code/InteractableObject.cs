using UnityEngine;

public class InteractableObject : MonoBehaviour
{
    public GameObject noteUI; // This will be assigned in the Inspector
    private bool isPlayerNearby = false;
    private PlayerMovement playerMovement;

    void Start()
    {
        playerMovement = GameObject.FindWithTag("Player").GetComponent<PlayerMovement>();

        if (noteUI == null)
        {
            Debug.LogError("Note UI Panel is not assigned!");
        }
        else
        {
            Debug.Log("Note UI Panel assigned successfully.");
        }
    }

    void Update()
    {
        if (isPlayerNearby && Input.GetKeyDown(KeyCode.E))
        {
            Debug.Log("Conditions fullfilled!!!");
            ToggleNote();
        }
    }

    void ToggleNote()
    {
        bool isActive = noteUI.activeSelf;
        noteUI.SetActive(!isActive);

        if (isActive)
        {
            Time.timeScale = 1f; // Resume game
            playerMovement.ToggleMovement(true); // Enable player movement
        }
        else
        {
            Time.timeScale = 0.0000001f; // Pause game
            playerMovement.ToggleMovement(false); // Disable player movement
        }
    }

    private void OnTriggerEnter2D(Collider2D other)
    {
        if (other.CompareTag("Player"))
        {
            isPlayerNearby = true;
        }
    }

    private void OnTriggerExit2D(Collider2D other)
    {
        if (other.CompareTag("Player"))
        {
            isPlayerNearby = false;
        }
    }
    void ShowNote()
    {
        Debug.Log("Showing note.");
        noteUI.SetActive(true);
    }

    void HideNote()
    {
        Debug.Log("Hiding note.");
        noteUI.SetActive(false);
    }
}
