<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <!-- Group Chat -->
            @if (Auth::user()->consent == 0)
                <div class="fixed inset-0 overflow-y-auto z-50" x-cloak>
                    <div class="flex items-center justify-center min-h-screen p-4">
                        <div class="bg-white w-full max-w-md p-4 rounded-lg shadow-lg">

                            <form action="{{ route('chat.consent') }}" method="post">
                                @csrf
                                <div class="mt-4">
                                    <p>
                                        Pour continuer vous devez accepter d'envoyer et de recevoir des messages
                                        des établissements qui interviennent dans le même secteur que vous. Cela
                                        inclut des informations relatives à des produits/services et des besoins
                                        de vos clients.
                                    </p>
                                </div>
                                <div class="mt-6 flex justify-end">
                                    <button type="submit" class="px-4 py-2 bg-green-500 text-white rounded-md">
                                        J'accepte
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            @else
                <div class="bg-white overflow-hidden shadow-lg sm:rounded-lg">

                    <div class="p-6 text-gray-900">
                        <!-- Group Header -->
                        <div class="group-header">
                            <h2 class="group-title">Chat</h2>
                        </div>

                        <div class="group-chat">
                            <!-- Messages Container -->
                            <div class="messages-container">
                                <!-- Messages -->
                                @foreach ($messages as $item)
                                    <div class="messages">

                                        @if (Auth::user()->structure_id != $item->structure_id)
                                            <!-- Message from user -->
                                            <div class="message">
                                                <div class="message-avatar">
                                                    <img src="assets/img/146.jpg" alt="Avatar" class="avatar">
                                                </div>
                                                <div class="message-content received-message">
                                                    <span class="message-sender" style="color:blueviolet;">
                                                        {{ $item->structure->name }}
                                                    </span>
                                                    <p>{!! $item->message !!} </p>
                                                    <span class="message-timestamp">{{ $item->created_at }}</span>
                                                </div>
                                            </div>
                                        @else
                                            <!-- Message to user -->
                                            <div v-else class="message message-outgoing"
                                                style="flex-direction: row-reverse;">
                                                <div class="message-content sent-message">
                                                    <p>{!! $item->message !!}</p>
                                                    <span class="message-timestamp">{{ $item->created_at }}</span>
                                                </div>
                                            </div>
                                        @endif
                                        <!-- Add more messages as needed -->
                                    </div>
                                @endforeach

                            </div>

                            <!-- Message Input -->
                            <form action="{{ route('chat.store') }}" method="POST"
                                class="message-input grid grid-cols-12">
                                @csrf
                                <div class="col-span-10">
                                    <textarea id="editor" class="form-control" placeholder="Tapez votre message ici" name="message"></textarea>
                                </div>
                                <div class="col-span-2">
                                    <button type="submit" class="btn btn-primary send-button">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M6 12 3.269 3.125A59.769 59.769 0 0 1 21.485 12 59.768 59.768 0 0 1 3.27 20.875L5.999 12Zm0 0h7.5" />
                                        </svg>
                                    </button>
                                </div>

                            </form>
                        </div>
                    </div>
                    <!-- Main content END -->
                </div>
            @endif
        </div>
    </div>
</x-app-layout>
