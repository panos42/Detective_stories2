using UnityEngine;

public class Note : MonoBehaviour
{
    public GameObject noteUIPanel; // Assign the note UI Panel in the inspector

    void Start()
    {
        Debug.Log("Note script started.");
        
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
            ShowNote();
        }
    }

    void Update()
    {
        if (noteUIPanel.activeSelf && Input.GetMouseButtonDown(0)) // Check if the note UI is active and the player clicks
        {
            Debug.Log("Mouse button clicked to hide note.");
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
