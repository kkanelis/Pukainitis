class AnimalSwiper {
    constructor() {
        this.container = document.querySelector('.cards-stack');
        this.cards = document.querySelectorAll('.card');
        this.currentIndex = 0;
        this.startX = 0;
        this.startY = 0;
        this.currentX = 0;
        this.currentY = 0;
        this.isDragging = false;

        this.init();
    }

    init() {

        document.addEventListener('touchstart', (e) => this.handleStart(e), false);
        document.addEventListener('touchmove', (e) => this.handleMove(e), false);
        document.addEventListener('touchend', (e) => this.handleEnd(e), false);

        document.addEventListener('mousedown', (e) => this.handleStart(e), false);
        document.addEventListener('mousemove', (e) => this.handleMove(e), false);
        document.addEventListener('mouseup', (e) => this.handleEnd(e), false);
        
    }

    handleStart(e) {
        const card = e.target.closest('.card');
        if (!card || card !== this.getCurrentCard()) return;

        this.isDragging = true;
        this.startX = e.touches ? e.touches[0].clientX : e.clientX;
        this.startY = e.touches ? e.touches[0].clientY : e.clientY;
        this.currentX = 0;
        this.currentY = 0;

        card.classList.add('dragging');
    }

    handleMove(e) {
        if (!this.isDragging) return;

        const card = this.getCurrentCard();
        const currentXPos = e.touches ? e.touches[0].clientX : e.clientX;
        const currentYPos = e.touches ? e.touches[0].clientY : e.clientY;

        this.currentX = currentXPos - this.startX;
        this.currentY = currentYPos - this.startY;

        const ratio = this.currentX / 300;
        card.style.transform = `translateX(${this.currentX}px) rotate(${ratio * 20}deg)`;
        card.style.opacity = 1 - Math.abs(ratio) * 0.5;
    }

    handleEnd(e) {
        if (!this.isDragging) return;

        this.isDragging = false;
        const card = this.getCurrentCard();
        card.classList.remove('dragging');

        const threshold = 100;

        if (Math.abs(this.currentX) > threshold) {
            this.swipeCard(this.currentX > 0 ? 'right' : 'left');
        } else {
            card.style.transform = '';
            card.style.opacity = '';
        }
    }

    swipeCard(direction) {
        const card = this.getCurrentCard();
        if (!card) return;

        if (direction === 'right') {
            const animalId = card.dataset.animalId;
            this.sendLike(animalId);
        }

        card.classList.add(`swipe-${direction}`);
        
        setTimeout(() => {
            card.style.display = 'none';
            this.currentIndex++;
            this.updateStackOrder();

            if (this.currentIndex >= this.cards.length) {
                this.showEmptyState();
            }
        }, 600);
    }

    sendLike(animalId) {
        fetch('/animals/like', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]')?.content || ''
            },
            body: JSON.stringify({
                animal_id: animalId
            })
        })
        .then(response => response.json())
    }

    updateStackOrder() {
        this.cards.forEach((card, index) => {
            card.style.display = 'flex';
            const offset = index - this.currentIndex;
            if (offset >= 0) {
                card.style.zIndex = 10 - offset;
                card.style.transform = `translateY(${offset * 10}px) scale(${1 - offset * 0.05})`;
            } else {
                card.style.display = 'none';
            }
        });
    }

    getCurrentCard() {
        return this.cards[this.currentIndex];
    }

    showEmptyState() {
        this.container.style.display = 'none';
        document.querySelector('.empty-state').style.display = 'block';
    }
}

document.addEventListener('DOMContentLoaded', () => {
    new AnimalSwiper();
});
