<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Inquiries extends Model
{
    protected $connection = 'mongodb';
    protected $collection = 'inquiries'; // Define the MongoDB collection name

    protected $fillable = [
        'name',
        'email',
        'contactNumber',
        'subject',
        'message',
        'status',
        'statusHistory',
    ];

    protected $attributes = [
        'status' => 'Pending', // Default value for status
    ];

    protected $casts = [
        'statusHistory' => 'array', // Ensure statusHistory is stored as an array
    ];

    protected $dates = ['created_at', 'updated_at'];

    /**
     * Add a status change to the statusHistory.
     */
    public function updateStatus(string $newStatus)
    {
        if (!in_array($newStatus, ['Pending', 'In Progress', 'Resolved'])) {
            throw new \InvalidArgumentException('Invalid status value.');
        }

        $this->status = $newStatus;
        $this->statusHistory = array_merge($this->statusHistory ?? [], [
            [
                'status' => $newStatus,
                'changedAt' => now(),
            ]
        ]);
        $this->save();
    }
}
