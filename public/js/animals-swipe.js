class AnimalSwiper {
    constructor() {
        this.container = document.querySelector('.cards-stack');
        this.cards = document.querySelectorAll('.card');
        this.idx = 0;
        this.startX = 0;
        this.startY = 0;
        this.moveX = 0;
        this.moveY = 0;
        this.dragging = false;

        this.setup();
    }

    setup() {
        document.addEventListener('touchstart', (e) => this.start(e), false);
        document.addEventListener('touchmove', (e) => this.move(e), false);
        document.addEventListener('touchend', (e) => this.end(e), false);

        document.addEventListener('mousedown', (e) => this.start(e), false);
        document.addEventListener('mousemove', (e) => this.move(e), false);
        document.addEventListener('mouseup', (e) => this.end(e), false);
    }

    start(e) {
        const card = e.target.closest('.card');
        if (!card || card !== this.getCurrentCard()) return;

        this.dragging = true;
        this.startX = e.touches ? e.touches[0].clientX : e.clientX;
        this.startY = e.touches ? e.touches[0].clientY : e.clientY;
        this.moveX = 0;
        this.moveY = 0;

        card.classList.add('dragging');
    }

    move(e) {
        if (!this.dragging) return;

        const card = this.getCurrentCard();
        const posX = e.touches ? e.touches[0].clientX : e.clientX;
        const posY = e.touches ? e.touches[0].clientY : e.clientY;

        this.moveX = posX - this.startX;
        this.moveY = posY - this.startY;

        const rot = this.moveX / 300;
        card.style.transform = `translateX(${this.moveX}px) rotate(${rot * 20}deg)`;
        card.style.opacity = 1 - Math.abs(rot) * 0.5;
    }

    end(e) {
        if (!this.dragging) return;

        this.dragging = false;
        const card = this.getCurrentCard();
        card.classList.remove('dragging');

        const minSwipe = 100;

        if (Math.abs(this.moveX) > minSwipe) {
            this.swipe(this.moveX > 0 ? 'right' : 'left');
        } else {
            card.style.transform = '';
            card.style.opacity = '';
        }
    }

    swipe(dir) {
        const card = this.getCurrentCard();
        if (!card) return;

        if (dir === 'right') {
            const id = card.dataset.animalId;
            this.like(id);
        }

        card.classList.add(`swipe-${dir}`);
        
        setTimeout(() => {
            card.style.display = 'none';
            this.idx++;
            this.rearrange();

            if (this.idx >= this.cards.length) {
                this.showEmpty();
            }
        }, 600);
    }

    like(animalId) {
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
        .then(resp => resp.json())
    }

    rearrange() {
        this.cards.forEach((card, i) => {
            card.style.display = 'flex';
            const off = i - this.idx;
            if (off >= 0) {
                card.style.zIndex = 10 - off;
                card.style.transform = `translateY(${off * 10}px) scale(${1 - off * 0.05})`;
            } else {
                card.style.display = 'none';
            }
        });
    }

    getCurrentCard() {
        return this.cards[this.idx];
    }

    showEmpty() {
        this.container.style.display = 'none';
        document.querySelector('.empty-state').style.display = 'block';
    }
}

document.addEventListener('DOMContentLoaded', () => {
    new AnimalSwiper();
});
