<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-lg sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <!-- Group Header -->
                    <div class="group-header">

                        <h2 class="group-title">Chat</h2>

                    </div>
                    <!-- Group Chat -->
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
                        <form action="{{ route('chat.store') }}" method="POST" class="message-input grid grid-cols-12">
                            @csrf
                            <div class="col-span-10">
                                <textarea id="editor" class="form-control" placeholder="Tapez votre message ici" name="message"></textarea>
                            </div>
                            <div class="col-span-2">
                                <button type="submit" class="btn btn-primary send-button">Envoyer</button>
                            </div>

                        </form>
                    </div>
                </div>
                <!-- Main content END -->

            </div>
        </div>
    </div>
</x-app-layout>
