
// Карусель
document.addEventListener("DOMContentLoaded", function () {
    const container = document.querySelector(".discount-container");
    const prevBtn = document.querySelector(".prev-btn");
    const nextBtn = document.querySelector(".next-btn");
    const cards = document.querySelectorAll(".discount-card");
    const cardWidth = cards[0].offsetWidth + 20;
    let currentIndex = 0;
    const totalCards = cards.length;

    // Клонируем первую и последнюю карточку для бесшовного эффекта
    const firstClone = cards[0].cloneNode(true);
    const lastClone = cards[totalCards - 1].cloneNode(true);

    // Добавляем клоны в начало и конец
    container.appendChild(firstClone);
    container.insertBefore(lastClone, cards[0]);

    // Обновляем список карточек
    const updatedCards = document.querySelectorAll(".discount-card");
    const updatedTotalCards = updatedCards.length;

    // // Устанавливаем начальную позицию
    // container.style.transform = `translateX(-${cardWidth}px)`;

    function updateCarousel() {
        container.style.transition = "transform 0.5s ease-in-out";
        container.style.transform = `translateX(-${(currentIndex + 1) * cardWidth}px)`;
    }

    nextBtn.addEventListener("click", function () {
        if (currentIndex >= totalCards - 1) return;
        currentIndex++;
        updateCarousel();

        if (currentIndex === totalCards) {
            setTimeout(() => {
                container.style.transition = "none";
                currentIndex = 0;
                container.style.transform = `translateX(-${cardWidth}px)`;
            }, 500);
        }
    });

    prevBtn.addEventListener("click", function () {
        if (currentIndex <= -1) return;
        currentIndex--;
        updateCarousel();

        if (currentIndex === -1) {
            setTimeout(() => {
                container.style.transition = "none";
                currentIndex = totalCards - 1;
                container.style.transform = `translateX(-${totalCards * cardWidth}px)`;
            }, 500);
        }
    });

    // Останавливаем глюки при изменении размера окна
    window.addEventListener("resize", function () {
        container.style.transition = "none";
        container.style.transform = `translateX(-${(currentIndex + 1) * cardWidth}px)`;
    });
});

// //для кнопки//
// document.getElementById("scrollToTop").addEventListener("click", function () {
//     window.scrollTo({ top: 0, behavior: "smooth" });
// });

