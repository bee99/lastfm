<?php
$prev = $page - 1;
$next = $page + 1;
?>
<div id="pager">
    <table>
        <tr>
            <td>
                <?php
                    echo \Includes\Helpers::printLink(
                        "?" . http_build_query(['keyword' => $keyword, 'page' => 1]),
                        "<<"
                    );
                ?>
            </td>
            <td>
                <?php if($page > 1) {
                    echo \Includes\Helpers::printLink(
                        "?" . http_build_query(['keyword' => $keyword, 'page' => $prev]),
                        "<"
                    );
                } else {
                    echo \Includes\Helpers::printLink(
                        "?" . http_build_query(['keyword' => $keyword, 'page' => 1]),
                        "<"
                    );
                }
                ?>
            </td>
            <td>
                <?php if($page < $totalPages) {
                    echo \Includes\Helpers::printLink(
                        "?" . http_build_query(['keyword' => $keyword, 'page' => $next]),
                        ">"
                    );
                } else {
                    echo \Includes\Helpers::printLink(
                        "?" . http_build_query(['keyword' => $keyword, 'page' => $totalPages]),
                        ">>"
                    );
                }
                ?>
            </td>
            <td>
                <?php
                echo \Includes\Helpers::printLink(
                    "?" . http_build_query(['keyword' => $keyword, 'page' => $totalPages]),
                    ">>"
                );
                ?>
            </td>
        </tr>
    </table>
</div>
