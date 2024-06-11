using UnityEngine;
using UnityEngine.UI;
using System.Collections;

public class LevelIntro1 : MonoBehaviour
{
    public Image blackScreen;
    public Text levelNameText;
    public Text extraText;

    public float displayDuration = 12f; // Duration to display the level intro
    public float fadeDuration = 3f; // Duration of the fade-out

    void Start()
    {
        StartCoroutine(ShowLevelIntro());
    }

    private IEnumerator ShowLevelIntro()
    {
        //Time.timeScale = 0.00001f;
        // Ensure the UI is active at the start
        blackScreen.gameObject.SetActive(true);
        levelNameText.gameObject.SetActive(true);
        extraText.gameObject.SetActive(true);

        // Wait for the display duration
        yield return new WaitForSeconds(displayDuration);

        // Start fading out
        float elapsedTime = 0f;
        Color blackColor = blackScreen.color;
        Color levelNameColor = levelNameText.color;
        Color extraTextColor = extraText.color;

        while (elapsedTime < fadeDuration)
        {
            float alpha = Mathf.Clamp01(1 - (elapsedTime / fadeDuration));
            blackColor.a = alpha;
            levelNameColor.a = alpha;
            extraTextColor.a = alpha;

            blackScreen.color = blackColor;
            levelNameText.color = levelNameColor;
            extraText.color = extraTextColor;

            elapsedTime += Time.deltaTime;
            yield return null;
        }

        //Time.timeScale = 1f;

        // Deactivate the UI elements
        blackScreen.gameObject.SetActive(false);
        levelNameText.gameObject.SetActive(false);
        extraText.gameObject.SetActive(false);
    }
}

