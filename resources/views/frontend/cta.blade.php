<!-- Call to Action -->
<section
    class="text-center lg:rounded-lg lg:bg-white lg:p-10 lg:shadow-xs lg:ring-1 lg:ring-zinc-950/5 dark:lg:bg-zinc-900 dark:lg:ring-white/10 space-y-4">

    <h2 class="text-2xl font-semibold">
        <i class="fa-solid fa-paper-plane mr-2 text-sitiweb-green"></i> Wat kan ik voor jou betekenen?
    </h2>

    <p class="text-gray-600 dark:text-gray-300 text-sm">
        📬 Ook beschikbaar voor freelance opdrachten of samenwerkingen. <br>

    </p>

    <div class="flex justify-center gap-4 mt-4 flex-wrap">
        <button onclick="openContactModal()"
            class="px-5 py-2 bg-sitiweb-green text-white rounded-full text-sm font-medium hover:bg-green-700 transition">
            <i class="fa-solid fa-envelope mr-2"></i> Contact opnemen
        </button>

    </div>
</section>

<!-- Contact Modal -->
<div id="contact-modal" class="fixed inset-0 z-50 hidden bg-black/50 flex items-center justify-center">
    <div class="bg-white dark:bg-zinc-900 rounded-lg shadow-lg max-w-md w-full p-6 space-y-4">
        <h3 class="text-xl font-semibold text-zinc-800 dark:text-white">Stuur een bericht</h3>
        <form id="contact-form" class="space-y-4">
            <div>
                <label for="name" class="block text-sm font-medium text-zinc-700 dark:text-zinc-300">Naam</label>
                <input type="text" id="name" name="name" required
                    class="w-full mt-1 px-3 py-2 border border-zinc-300 rounded-md focus:outline-none focus:ring-2 focus:ring-sitiweb-green dark:bg-zinc-800 dark:border-zinc-600 dark:text-white" />
            </div>
            <div>
                <label for="email" class="block text-sm font-medium text-zinc-700 dark:text-zinc-300">E-mail
                    (optioneel)</label>
                <input type="email" id="email" name="email"
                    class="w-full mt-1 px-3 py-2 border border-zinc-300 rounded-md focus:outline-none focus:ring-2 focus:ring-sitiweb-green dark:bg-zinc-800 dark:border-zinc-600 dark:text-white" />
            </div>
            <div>
                <label for="phone" class="block text-sm font-medium text-zinc-700 dark:text-zinc-300">Telefoonnummer
                    (optioneel)</label>
                <input type="tel" id="phone" name="phone"
                    class="w-full mt-1 px-3 py-2 border border-zinc-300 rounded-md focus:outline-none focus:ring-2 focus:ring-sitiweb-green dark:bg-zinc-800 dark:border-zinc-600 dark:text-white" />
            </div>

            <div>
                <label for="message" class="block text-sm font-medium text-zinc-700 dark:text-zinc-300">Bericht</label>
                <textarea id="message" name="message" required rows="4"
                    class="w-full mt-1 px-3 py-2 border border-zinc-300 rounded-md focus:outline-none focus:ring-2 focus:ring-sitiweb-green dark:bg-zinc-800 dark:border-zinc-600 dark:text-white"></textarea>
            </div>
            <div class="flex justify-end gap-2">
                <button type="button" onclick="closeContactModal()"
                    class="px-4 py-2 text-sm bg-zinc-200 text-zinc-800 rounded-md hover:bg-zinc-300 dark:bg-zinc-700 dark:text-white dark:hover:bg-zinc-600">
                    Annuleren
                </button>
                <button type="submit"
                    class="px-4 py-2 text-sm bg-sitiweb-green text-white rounded-md hover:bg-green-700">
                    Versturen
                </button>
            </div>
        </form>
    </div>
</div>

@push('scripts')
    <script>
        function openContactModal() {
            document.getElementById('contact-modal').classList.remove('hidden');
        }

        function closeContactModal() {
            document.getElementById('contact-modal').classList.add('hidden');
        }

        document.getElementById('contact-form').addEventListener('submit', async function(e) {
            e.preventDefault();

            const name = document.getElementById('name').value.trim();
            const message = document.getElementById('message').value.trim();
            const email = document.getElementById('email').value.trim();
            const phone = document.getElementById('phone').value.trim();


            try {
                const response = await fetch('/contact', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'Accept': 'application/json',
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]')?.getAttribute(
                            'content'),
                    },
                    body: JSON.stringify({
                        name,
                        message,
                        email,
                        phone
                    }),

                });

                if (response.ok) {
                    alert('Bericht succesvol verzonden!');
                    closeContactModal();
                    this.reset();
                } else {
                    alert('Er ging iets mis bij het verzenden.');
                }
            } catch (error) {
                console.error('Fout:', error);
                alert('Netwerkfout bij verzenden.');
            }
        });
    </script>
@endpush
