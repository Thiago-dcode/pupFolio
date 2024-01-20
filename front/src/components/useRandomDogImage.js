// useRandomDogImage.js
import { ref } from 'vue';

const useRandomDogImage = () => {
  const isLoading = ref(false);
  const fullImageUrl = ref('');

  const getRandomDogImage = async (breed) => {
    if (!isLoading.value) {
      try {
        isLoading.value = true;

        // Perform additional fetch to get the missing information
        let response = await fetch(`https://dog.ceo/api/breed/${breed.replace(/\s/g, '').toLowerCase()}/images/random`);

        if (!response.ok) {
          if (response.status === 404) {
            console.log(response.status);
            response = await fetch('https://dog.ceo/api/breeds/image/random');
          }
        }

        const additionalInfoData = await response.json();
        fullImageUrl.value = additionalInfoData.message;
      } catch (error) {
        console.error('Error fetching additional information:', error);
      } finally {
        isLoading.value = false;
      }
    }
  };

  return {
    isLoading,
    fullImageUrl,
    getRandomDogImage,
  };
};

export default useRandomDogImage;