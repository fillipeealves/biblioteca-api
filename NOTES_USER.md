Abra app/Models/User.php e adicione:
public function loans() { return $this->hasMany(Loan::class); }
