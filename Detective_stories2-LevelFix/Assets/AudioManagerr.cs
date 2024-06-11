using System.Collections;
using System.Collections.Generic;
using UnityEngine;

public class AudioManagerr : MonoBehaviour
{
    [Header("-------Audio Source------")]
    [SerializeField] AudioSource musicSource;
    // Start is called before the first frame update
    public AudioClip background;

    private void Start()
    {
        musicSource.clip = background;
        musicSource.Play();

        }
}
