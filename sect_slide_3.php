<section id="pricing">
    <div class="container">
        <p class="h1 section-title wow fadeIn" data-wow-delay=".2s">Цены</p>
        <div class="row">
            <?$APPLICATION->IncludeComponent(
                "coffeediz:table.column",
                "pricing",
                array(
                    "COMPONENT_TEMPLATE" => "pricing",
                    "TITLE" => "STARTUP",
                    "STRING" => array(
                        0 => "Bootstrap3",
                        1 => "Мастер установки",
                        2 => "4 цветовых схемы",
                        3 => "Техподдержка",
                        4 => "",
                    ),
                    "BUTTON_TEXT" => "Установить",
                    "BUTTON_URL" => "http://marketplace.1c-bitrix.ru/solutions/coffeediz.startbootstraplandingpage/",
                    "BLOCK_MD" => "4",
                    "BLOCK_SM" => "4",
                    "PRICE" => "0\$"
                ),
                false
            );?>
            <?$APPLICATION->IncludeComponent(
                "coffeediz:table.column",
                "pricing",
                array(
                    "COMPONENT_TEMPLATE" => "pricing",
                    "TITLE" => "Доработки <nobr>(1 час)</nobr>",
                    "STRING" => array(
                        0 => "Оплата по факту",
                        1 => "Гибкий подход",
                        2 => "Более 50 закрытых задач",
                        3 => "Тонкие доработки",
                        4 => "",
                    ),
                    "BUTTON_TEXT" => "Заказать",
                    "BUTTON_URL" => "mailto:a@coffeediz.ru",
                    "BLOCK_MD" => "4",
                    "BLOCK_SM" => "4",
                    "PRICE" => "20€"
                ),
                false
            );?>
            <?$APPLICATION->IncludeComponent(
                "coffeediz:table.column",
                "pricing",
                array(
                    "COMPONENT_TEMPLATE" => "pricing",
                    "TITLE" => "Спонсоркий пакет",
                    "STRING" => array(
                        0 => "Установка",
                        1 => "Замена контента",
                        2 => "Приоритет в работе",
                        3 => "Доработка \"под ключ\"",
                        4 => "",
                    ),
                    "BUTTON_TEXT" => "Заказать",
                    "BUTTON_URL" => "mailto:a@coffeediz.ru",
                    "BLOCK_MD" => "4",
                    "BLOCK_SM" => "4",
                    "PRICE" => "5000р"
                ),
                false
            );?>
        </div>
    </div>
</section>