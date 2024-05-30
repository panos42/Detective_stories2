using UnityEngine;
using UnityEngine.UI;
using UnityEngine.SceneManagement;
using System.Collections;

public class PasswordCheck : MonoBehaviour
{
    public GameObject passwordUIPanel;
    public InputField passwordInputField;
    
    public Button submitButton;
    public string correctPassword = "Ethan Goldberg";

    public Text SuspectFound;
    public Text CharacterText;
    public Image BlackScreen;

    private bool isPasswordUIPanelActive = false;

    void Start()
    {
        passwordUIPanel.SetActive(false);
        SuspectFound.gameObject.SetActive(false);
        CharacterText.gameObject.SetActive(false);
        BlackScreen.gameObject.SetActive(false);
        if (submitButton != null)
        {
            submitButton.onClick.AddListener(CheckPassword);
        }
    }

    void Update()
    {
        if (Input.GetKeyDown(KeyCode.G) && !isPasswordUIPanelActive && NoOtherUIVisible())
        {
            TogglePasswordUI(true);
        }
        else if (Input.GetKeyDown(KeyCode.Escape) && isPasswordUIPanelActive)
        {
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
            StartCoroutine(ShowMessagesAndChangeScene());            
        }
        else
        {
            Debug.Log("Incorrect password. Try again.");
            // Implement what happens when the password is incorrect
            passwordInputField.text = ""; // Clear the input field
        }
    }

    private IEnumerator ShowMessagesAndChangeScene()
    {
        CharacterText.gameObject.SetActive(true);
        SuspectFound.gameObject.SetActive(true);

        yield return new WaitForSecondsRealtime(10);

        BlackScreen.gameObject.SetActive(true);
        float fadeDuration = 2f;
        float elapsedTime = 0f;
        Color color = BlackScreen.color;

        while (elapsedTime < fadeDuration)
        {
            color.a = Mathf.Clamp01(elapsedTime/fadeDuration);
            BlackScreen.color = color;
            elapsedTime += Time.unscaledDeltaTime;
            yield return null;
        }

        Time.timeScale = 1f;

        SceneManager.LoadScene("Level 2");
    }
}
