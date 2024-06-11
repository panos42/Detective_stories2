using UnityEngine;
using UnityEngine.UI;

public class ComputerCheck : MonoBehaviour
{
    public GameObject passwordUIPanel;
    public InputField passwordInputField;

    public Button submitButton;
    public string correctPassword = "PATCCFL";

    public Text InsertPasswordText;
    public Text PromptText;
    public Text Convo1;
    public Text Convo2;
    public Text Convo3;
    public Text Convo4;
    public Text Convo5;

    public Image userImage;
    public Image Convo;

    private PlayerMovement playerMovement;

    private bool isPasswordUIPanelActive = false;

    void Start()
    {
        passwordUIPanel.SetActive(false);
        Convo.gameObject.SetActive(false);
        Convo1.gameObject.SetActive(false);
        Convo2.gameObject.SetActive(false);
        Convo3.gameObject.SetActive(false);
        Convo4.gameObject.SetActive(false);
        Convo5.gameObject.SetActive(false);

        if (submitButton != null)
        {
            submitButton.onClick.AddListener(CheckPassword);
        }
    }

    void OnTriggerEnter2D(Collider2D other)
    {
        Debug.Log("Trigger entered.");
        
        if (other.CompareTag("Player") && NoOtherUIVisible()) // Assuming the detective has a tag "Detective"
        {
            Debug.Log("Detective entered the note trigger.");
            TogglePasswordUI(true);
        }
    }

    void Update()
    {
        if (Input.GetKeyDown(KeyCode.Escape) && isPasswordUIPanelActive)
        {
            //passwordUIPanel.SetActive(false);
            //Convo.gameObject.SetActive(false);
            //Convo1.gameObject.SetActive(false);
            //Convo2.gameObject.SetActive(false);
            //Convo3.gameObject.SetActive(false);
            //Convo4.gameObject.SetActive(false);
            //Convo5.gameObject.SetActive(false);

            TogglePasswordUI(false);
        }
    }

    private bool NoOtherUIVisible()
    {
        Note noteScript = FindObjectOfType<Note>();
        return noteScript == null || !noteScript.noteUIPanel.activeSelf;
    }

    private void TogglePasswordUI(bool state)
    {
        passwordUIPanel.SetActive(state);
        isPasswordUIPanelActive = state;
        Time.timeScale = state ? 0f : 1f; // Pause the game when UI is active
    }

    private void CheckPassword()
    {
        if (passwordInputField.text == correctPassword)
        {
            Debug.Log("Password is correct!");

            passwordInputField.gameObject.SetActive(false);
            userImage.gameObject.SetActive(false);
            InsertPasswordText.gameObject.SetActive(false);
            PromptText.gameObject.SetActive(false);
            submitButton.gameObject.SetActive(false);

            Convo.gameObject.SetActive(true);
            Convo1.gameObject.SetActive(true);
            Convo2.gameObject.SetActive(true);
            Convo3.gameObject.SetActive(true);
            Convo4.gameObject.SetActive(true);
            Convo5.gameObject.SetActive(true);
        }
        else
        {
            Debug.Log("Incorrect password. Try again.");
            // Implement what happens when the password is incorrect
            passwordInputField.text = ""; // Clear the input field
        }
    }
}
