    <section id="Relatórios" class="p-4 ml-64 hidden">
        <div class="grid grid-row-2 gap-8">
            <section class="container px-4 mx-auto">
                <div class="flex flex-col gap-4 mt-6">
                    <div class="flex flex-row justify-between items-center mt-8">
                        <div>
                            <h1 class="text-2xl font-bold text-white">Relátorios</h1>
                            <p>Visualize os dados sem editar</p>
                        </div>
                    </div>

                    <div class="container mx-auto">
                        <div class="container mx-auto flex flex-row gap-4">
                            <!-- Filtros de dados dos usuarios -->
                            <div>
                                <button class="btn-filter" popovertarget="popover-1" style="anchor-name:--anchor-1" data-button="Turma">
                                    Turma
                                </button>
                            </div>
                            <div>
                                <button class=" btn-filter" popovertarget="popover-2" style="anchor-name:--anchor-2" data-button="Professor">
                                    Professor
                                </button>
                            </div>
                            <div>
                                <button class="btn-filter" popovertarget="popover-3" style="anchor-name:--anchor-3" data-button="Curso">
                                    Curso
                                </button>
                            </div>
                            <div>
                                <button class="btn-filter" popovertarget="popover-4" style="anchor-name:--anchor-4" data-button="disciplina">
                                    Disciplina
                                </button>
                            </div>
                        </div>
                        <div class="container mx-auto py-10">
                            <!-- Resultados dos filtros -->
                            <div class="content" id="Turma">
                                <h1 class="text-3xl mb-4">Desenpenho por Turma</h1>
                                <div class="overflow-x-auto">
                                    <table class="table table-zebra">
                                        <!-- head -->
                                        <thead>
                                            <tr>
                                                <th>Matricula</th>
                                                <th>Nome</th>
                                                <th>Turma</th>
                                                <th>Curso</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <!-- row 1 -->
                                            <?php if (!empty($dados['registros'])): ?>
                                                <?php foreach ($registros as $resgitro): ?>
                                                    <tr>
                                                        <td>
                                                            <?= $resgitro['numero_matricula'] ?>
                                                        </td>
                                                        <td>
                                                            <?= $resgitro['nome_aluno'] ?>
                                                        </td>
                                                        <td>
                                                            <?= $resgitro['nome_turma'] ?>
                                                        </td>
                                                        <td>
                                                            <?= $resgitro['nome_curso'] ?>
                                                        </td>
                                                    </tr>
                                                <?php endforeach; ?>
                                            <?php endif ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="hidden content" id="Professor">
                                <h1 class="text-3xl mb-4">Desenpenho por Professor</h1>
                                <div class="overflow-x-auto">
                                    <table class="table table-zebra">
                                        <!-- head -->
                                        <thead>
                                            <tr>
                                                <th>Disciplina</th>
                                                <th>Curso</th>
                                                <th>Turma</th>
                                                <th>Professor</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <!-- row 1 -->
                                            <?php if (!empty($dados['registroProfesor'])): ?>
                                                <?php foreach ($registroProfesor as $registro): ?>
                                                    <tr>
                                                        <td>
                                                            <?= $registro['nome_disciplina'] ?>
                                                        </td>
                                                        <td>
                                                            <?= $registro['nome_curso'] ?>
                                                        </td>
                                                        <td>
                                                            <?= $registro['nome_turma'] ?>
                                                        </td>
                                                        <td>
                                                            <?= $registro['nome_professor'] ?>
                                                        </td>
                                                    </tr>
                                                <?php endforeach; ?>
                                            <?php endif ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="hidden content" id="Curso">
                                <h1 class="text-3xl mb-4 ">Desenpenho por Curso</h1>
                                <div class="overflow-x-auto">
                                    <table class="table table-zebra">
                                        <!-- head -->
                                        <thead>
                                            <tr>
                                                <th></th>
                                                <th>Name</th>
                                                <th>Job</th>
                                                <th>Favorite Color</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <!-- row 1 -->
                                            <tr>
                                                <th>1</th>
                                                <td>Cy Ganderton</td>
                                                <td>Quality Control Specialist</td>
                                                <td>Blue</td>
                                            </tr>
                                            <!-- row 2 -->
                                            <tr>
                                                <th>2</th>
                                                <td>Hart Hagerty</td>
                                                <td>Desktop Support Technician</td>
                                                <td>Purple</td>
                                            </tr>
                                            <!-- row 3 -->
                                            <tr>
                                                <th>3</th>
                                                <td>Brice Swyre</td>
                                                <td>Tax Accountant</td>
                                                <td>Red</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="hidden content" id="disciplina">
                                <h1 class="text-3xl mb-4">Desenpenho por Disciplina</h1>
                                <div class="overflow-x-auto">
                                    <table class="table table-zebra">
                                        <!-- head -->
                                        <thead>
                                            <tr>
                                                <th></th>
                                                <th>Name</th>
                                                <th>Job</th>
                                                <th>Favorite Color</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <!-- row 1 -->
                                            <tr>
                                                <th>1</th>
                                                <td>Cy Ganderton</td>
                                                <td>Quality Control Specialist</td>
                                                <td>Blue</td>
                                            </tr>
                                            <!-- row 2 -->
                                            <tr>
                                                <th>2</th>
                                                <td>Hart Hagerty</td>
                                                <td>Desktop Support Technician</td>
                                                <td>Purple</td>
                                            </tr>
                                            <!-- row 3 -->
                                            <tr>
                                                <th>3</th>
                                                <td>Brice Swyre</td>
                                                <td>Tax Accountant</td>
                                                <td>Red</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <script src="assets/js/relatorio.js"></script>