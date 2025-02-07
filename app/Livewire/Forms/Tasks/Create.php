<?php

namespace App\Livewire\Forms\Tasks;

use Livewire\Component;
use Livewire\Attributes\Validate;
use App\Models\Task;
use Livewire\WithFileUploads; // Import the file upload trait for handling files

class Create extends Component
{
    use WithFileUploads;

    // Define properties for the form fields and use the Validate attribute for validation
    #[Validate('required|exists:users,id')]
    public $user_id;

    #[Validate('required|string|max:255')]
    public $title;

    #[Validate('nullable|string')]
    public $note;

    #[Validate('nullable|date')]
    public $due_date;

    #[Validate('nullable|in:personal,business')]
    public $category;

    #[Validate('nullable|string|max:255')]
    public $client;

    #[Validate('nullable|string|max:255')]
    public $docs;

    #[Validate('nullable|string|max:255')]
    public $tag;

    #[Validate('nullable|url')]
    public $url;

    #[Validate('nullable|array')]
    public $files = [];

    // Validation messages (optional)
    protected $messages = [
        'files.*.mimes' => 'Only PDF, PNG, JPEG, JPG, DOC, DOCX, and ZIP files are allowed.',
        'files.*.max' => 'File size cannot exceed 10MB.',
    ];

    // Handle form submission
    public function submit()
    {
        // Validate the form inputs using the attribute-based validation
        $this->validate();

        // Store the task
        $task = Task::create([
            'user_id' => $this->user_id,
            'title' => $this->title,
            'note' => $this->note,
            'due_date' => $this->due_date,
            'category' => $this->category,
            'client' => $this->client,
            'docs' => $this->docs,
            'tag' => $this->tag,
            'url' => $this->url,
        ]);

        // Handle file uploads (if any)
        if ($this->files) {
            foreach ($this->files as $file) {
                // Store each file and associate with the task
                $task->files()->create([
                    'path' => $file->store('tasks/files'), // Store the file in a specific directory
                    'file_name' => $file->getClientOriginalName(),
                ]);
            }
        }

        // Optionally, reset form inputs after submission
        $this->reset();

        // Redirect or give feedback
        session()->flash('message', 'Task successfully created!');
    }

    public function render()
    {
        return view('livewire.forms.tasks.create');
    }
}
