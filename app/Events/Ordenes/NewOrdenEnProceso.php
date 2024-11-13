<?php

namespace App\Events\Ordenes;

use App\Models\OrdenTrabajo;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class NewOrdenEnProceso implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;


    /**
     * New Orden Iniciada
     *
     * @param  \App\Models\OrdenTrabajo  $orden
     */
    public OrdenTrabajo $orden;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(OrdenTrabajo $orden)
    {
        $this->orden = $orden;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        return new Channel('ordenes');
    }

    /**
     * Name of the event
     *
     * @return string
     */
    public function broadcastAs() : string
    {
        return 'newOrdenEnProceso';
    }

    /**
     * Data to broadcast
     *
     * @return array
     */
    public function broadcastWith() : array
    {
        return [
            'id'         => $this->orden->id,
            'id_estatus' => $this->orden->id_estatus,
            'created_at' => $this->orden->created_at,
        ];
    }
}
