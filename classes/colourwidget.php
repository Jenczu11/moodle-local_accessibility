<?php
// This file is part of Moodle - https://moodle.org/
//
// Moodle is free software: you can redistribute it and/or modify
// it under the terms of the GNU General Public License as published by
// the Free Software Foundation, either version 3 of the License, or
// (at your option) any later version.
//
// Moodle is distributed in the hope that it will be useful,
// but WITHOUT ANY WARRANTY; without even the implied warranty of
// MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
// GNU General Public License for more details.
//
// You should have received a copy of the GNU General Public License
// along with Moodle.  If not, see <https://www.gnu.org/licenses/>.

/**
 * Abstract class of colour-picker widgets
 *
 * @package     local_accessibility
 * @copyright   2023 Ponlawat Weerapanpisit <ponlawat_w@outlook.co.th>
 * @license     https://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

namespace local_accessibility\widgets;

defined('MOODLE_INTERNAL') or die();

/**
 * Abstract class of colour-picker widgets
 */
abstract class colourwidget extends widgetbase {
    protected $class = 'col-12';

    public function getcontent() {
        /**
         * @var \core_renderer $OUTPUT
         * @var \moodle_page $PAGE
         */
        global $OUTPUT, $PAGE;
        $id = $this->getfullname() . '-picker';
        $icon = new \pix_icon('i/loading', '', 'moodle', ['class' => 'loadingicon']);
        $PAGE->requires->js_init_call('M.util.init_colour_picker', [$id, true]);
        return $OUTPUT->render_from_template('local_accessibility/widgets/colour', [
            'id' => $id,
            'name' => $this->getfullname(),
            'widgetname' => $this->getfullname(),
            'value' => '',
            'icon' => $icon->export_for_template($OUTPUT),
            'haspreviewconfig' => false,
            'forceltr' => false,
            'readonly' => false
        ]);
    }
}
