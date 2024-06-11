using UnityEngine;
using UnityEngine.UI;

public class ComputerCheck3 : MonoBehaviour
{
    public GameObject passwordUIPanel;
    public InputField passwordInputField;

    public Button submitButton;
    public string correctPassword = "1618";

    public Text InsertPasswordText;
    public Text text1;
    public Text text2;
    public Text text3;
    public Text text41;
    public Text text42;
    public Text text43;

    public Image opensafe;
    public Image noteinsafe;

    private PlayerMovement playerMovement;

    private bool isPasswordUIPanelActive = false;

    void Start()
    {
        passwordUIPanel.SetActive(false);
        opensafe.gameObject.SetActive(false);
        noteinsafe.gameObject.SetActive(false);
        text1.gameObject.SetActive(false);
        text2.gameObject.SetActive(false);
        text3.gameObject.SetActive(false);
        text41.gameObject.SetActive(false);
        text42.gameObject.SetActive(false);
        text43.gameObject.SetActive(false);

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
            InsertPasswordText.gameObject.SetActive(false);
            submitButton.gameObject.SetActive(false);

            opensafe.gameObject.SetActive(true);
            noteinsafe.gameObject.SetActive(true);
            text1.gameObject.SetActive(true);
            text2.gameObject.SetActive(true);
            text3.gameObject.SetActive(true);
            text41.gameObject.SetActive(true);
            text42.gameObject.SetActive(true);
            text43.gameObject.SetActive(true);
        }
        else
        {
            Debug.Log("Incorrect password. Try again.");
            // Implement what happens when the password is incorrect
            passwordInputField.text = ""; // Clear the input field
        }
    }
}
