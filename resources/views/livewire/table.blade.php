<div>
    <style>
        .temporary-bounce {
            -webkit-animation-iteration-count: 0.5;
            animation-iteration-count: 0.5;
        }
    </style>
    @if($is_table_visible)
        <table
            class="animate-bounce temporary-bounce shadow-xl w-full text-left text-gray-500">
            <thead class="text-xs bg-black font-bold logo-color">
            <tr>
                <th scope="col" class="py-3 px-6">
                    Размер
                </th>
                <th scope="col" class="py-3 px-6">
                    Длина
                </th>
                <th scope="col" class="py-3 px-6">
                    Ширина
                </th>
                <th scope="col" class="py-3 px-6">
                    Рукав
                </th>
            </tr>
            </thead>
            <tbody class="bg-black font-bold logo-color">
            <tr class="bg-black border-b border-green-200">
                <th scope="row" class="py-4 px-6 font-bold logo-color whitespace-nowrap">
                    S
                </th>
                <td class="py-4 px-6">
                    65
                </td>
                <td class="py-4 px-6">
                    47
                </td>
                <td class="py-4 px-6">
                    20
                </td>
            </tr>
            <tr class="bg-black border-b border-green-200 dark:border-gray-700">
                <th scope="row" class="py-4 px-6 font-bold logo-color whitespace-nowrap">
                    M
                </th>
                <td class="py-4 px-6">
                    68
                </td>
                <td class="py-4 px-6">
                    50
                </td>
                <td class="py-4 px-6">
                    20
                </td>
            </tr>
            <tr class="bg-black border-b border-green-200 dark:border-gray-700">
                <th scope="row" class="py-4 px-6 font-bold logo-color whitespace-nowrap">
                    L
                </th>
                <td class="py-4 px-6">
                    73
                </td>
                <td class="py-4 px-6">
                    54
                </td>
                <td class="py-4 px-6">
                    20
                </td>
            </tr>
            <tr class="bg-black border-b border-green-200 dark:border-gray-700">
                <th scope="row" class="py-4 px-6 font-bold logo-color whitespace-nowrap">
                    XL
                </th>
                <td class="py-4 px-6">
                    76
                </td>
                <td class="py-4 px-6">
                    57
                </td>
                <td class="py-4 px-6">
                    22
                </td>
            </tr>
            <tr class="bg-black border-b border-green-200 dark:border-gray-700">
                <th scope="row" class="py-4 px-6 font-bold logo-color whitespace-nowrap">
                    XXL
                </th>
                <td class="py-4 px-6">
                    79
                </td>
                <td class="py-4 px-6">
                    60
                </td>
                <td class="py-4 px-6">
                    22
                </td>
            </tr>
            <tr class="bg-black">
                <th scope="row" class="py-4 px-6 font-bold logo-color whitespace-nowrap">
                    XXXL
                </th>
                <td class="py-4 px-6">
                    82
                </td>
                <td class="py-4 px-6">
                    63
                </td>
                <td class="py-4 px-6">
                    24
                </td>
            </tr>
            </tbody>
        </table>
    @endif
</div>
