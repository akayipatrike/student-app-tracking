<?php

namespace App\Livewire\Teacher\Students;

use App\Models\Grade;
use Livewire\Component;
use App\Models\Student;
use Livewire\Attributes\Title;
use Masmerise\Toaster\Toaster;

#[Title('Présence des étudiants | Ajouter un Etudiant')]

class AddStudent extends Component
{

    public $grades = [];
    public $first_name= '';
    public $last_name = '';
    public $age = '';
    public $grade = '';

    public function mount()
    {
        $this->grades = Grade::all();
    }

    public function save()
    {
        $this->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'age' => 'required|integer|min:1',
            'grade' => 'required|exists:grades,id',
        ]);


        Student::create([
            'first_name' => $this->first_name,
            'last_name' => $this->last_name,
            'age' => $this->age,
            'grade_id' => $this->grade,
        ]);

        $this->reset();
        Toaster::success('Etudiant ajouté avec succès !');
        

        return redirect()->route('teacher.students.index');
    }
    public function render()
    {
        return view('livewire.teacher.students.add-student');
    }
}
